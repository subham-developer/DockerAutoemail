<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Repositories\JoiningRepo;
use App\Repositories\ClientRepo;
use App\Repositories\ResouceRepo;
use App\Repositories\InterviewRepo;
use App\Repositories\SettingRepo;
use App\Mail\JoiningAccountMail;
use App\Mail\joiningemp;
use App\Mail\joininggeofence;
use App\Mail\nonjoiningemp;
use App\Helper\CommonHelper;
use Session;

class JoiningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InterviewRepo = new JoiningRepo();
        $clients = $InterviewRepo->getclient(); 
        $resource = $InterviewRepo->getresource(['on_bench', 1]);   
        $invoicedates = Config('constants.DATE_OF_INVOICES');
        $contract_type = ['Monday to Friday','All Saturday','Alternate Saturday']; 
        return view('JoiningIndex',['clients' => $clients,'resources' => $resource,'invoicedates'=> $invoicedates,'contract_type'=>$contract_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $ResourceRepo = new ResouceRepo();
        $JoiningRepo = new JoiningRepo();
        if (isset($request['joining_id'])) {
            $res = $JoiningRepo->update($request,$request['joining_id']);   
        }
        else{
            $res = $JoiningRepo->store($request);
            if ($res) {
                $res = $ResourceRepo->updateOnBenchStatus($request['Resources']);
            }
        }
        // return redirect()->back()->with('alert', 'Joining Mail Send..!'); // remove from live
        $InterviewRepo = new InterviewRepo();
        $resource_dtl = $InterviewRepo->getresourcedtl($request['Resources']);
        $clients_dtl = $InterviewRepo->getclientdtl($request['clients']); 
        $setting = $InterviewRepo->getsetting();      
        $emp_email = $resource_dtl[0]->email;
        $accountant_email = $setting[0]->accountant_email;
        $cc_email = $setting[0]->cc_email;
        $sales_email = $setting[0]->salesperson;
        $geofence_email = $setting[0]->geofence_email;
        $techhead_email = $setting[0]->tech_head_email;
        $from = $setting[0]->from_email;
        $accountemailbody = $request['accountemail'];
        $empemail     = $request['empemail'];
        $geofence     = $request['geofence'];
        $content = array('body'=>$accountemailbody,'from'=>$from,'resource'=>$resource_dtl[0]->fname.' '.$resource_dtl[0]->lname,'client'=>$clients_dtl[0]->client_name);
        $content1 = array('body'=>$empemail,'from'=>$from,'filepath'=>$request['filepath'],'client'=>$clients_dtl[0]->client_name);
        $content2 = array('body'=>$geofence,'from'=>$from,'resource'=>$resource_dtl[0]->fname.' '.$resource_dtl[0]->lname,'client'=>$clients_dtl[0]->client_name);
        $ccmail1 = explode(',', $cc_email);
        array_push($ccmail1, $sales_email);
        $ccmail2 = explode(',', $cc_email);
        array_push($ccmail2, $sales_email);
        array_push($ccmail2, $techhead_email);

       Mail::to($accountant_email)
       ->cc($ccmail1)
       ->send(new JoiningAccountMail($content));

       Mail::to($emp_email)
       ->cc($ccmail2)
       ->send(new JoiningEmp($content1));

       Mail::to($geofence_email)
       ->cc($ccmail1)
       ->send(new JoiningGeofence($content2));

       return redirect()->back()->with('alert', 'Joining Mail Send..!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $JoiningRepo = new JoiningRepo();
        $res   = $JoiningRepo->show();
        $count = $JoiningRepo->getcount();
        $date_of_invoice = Config('constants.DATE_OF_INVOICES');
        return view('ViewJoining',['joiningDtl' => $res,'totalcount' => $count,'date_of_invoice' =>$date_of_invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    function editPage($id){
        $JoiningRepo = new JoiningRepo();
        $editJoin = $JoiningRepo->getJoining($id);
        if(count($editJoin) > 0){
          $InterviewRepo = new JoiningRepo();
          $clients = $InterviewRepo->getclient(); 
          $resource = $InterviewRepo->getresource();   
          $invoicedates = Config('constants.DATE_OF_INVOICES');
          $contract_type = ['Monday to Friday','All Saturday','Alternate Saturday']; 
          return view('EditJoining',['clients' => $clients,'resources' => $resource,'invoicedates'=> $invoicedates,'contract_type'=>$contract_type,'edit_join'=>$editJoin]);
        }else{
          return redirect()->back()->with('alert', 'Wrong resource id wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getresourcedetails(Request $request)
    {
        
    $ResourceRepo = new ResouceRepo();
    return $ResourceRepo->getuserdata($request['id']);
    }
    public function sendjoiningdata(Request $request)
    {
        $arr=[];

     
        $validator = Validator::make($request->all(),[
            'Resources'=>'required', 
            'Resource_Email'=>'required', 
            'client'=>'required',    
            'invoice_date'=>'required',
            'credit_period'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'address'=>'required']);

        if ($validator->fails())
        {
            // return "error";
            return response()->json(['errors'=>$validator->errors(),'data'=>'']);
        }
        else
        { 
            $old_date_timestamp = strtotime($request['start_date']);
            $new_date = date('d-M-Y', $old_date_timestamp);
            $new_time = date('h:i A', $old_date_timestamp);

            /*$ol = strtotime($request['invoice_date']);
            $invdt = date('d-M-Y', $ol); */
            $invoicedates = Config('constants.DATE_OF_INVOICES');
            $invdt = $invoicedates[$request['invoice_date']];
            $InterviewRepo = new InterviewRepo();
            $clients = $InterviewRepo->getclientdtl($request['client']);   

            $resource = $InterviewRepo->getresourcedtl($request['Resources']);
            $CommonHelper = new CommonHelper();
            $path ="";
            if (!empty($request['files'])) {
                $path = $CommonHelper->uploadfile1($request['files']);    
            }

            $accountemail = "<b><p>Dear accounts,</p></b>
            <p>Please note that ".$resource[0]->fname.' '.$resource[0]->lname." is joining ".$clients[0]->client_name." from effective date of ". $CommonHelper->convertDateFomate($new_date).".</p>
            <p>Invoice date is ".$invdt." and credit period is ".$request['credit_period']." Days.</p>
            <p>Kindly ask the salesguy other billing details.</p>";

            $employeeemail = "<b><p>Dear ".$resource[0]->fname.' '.$resource[0]->lname.",</p></b>
            <p>Congratulations on being onboarded to our new project with ".$clients[0]->client_name."  Please report to ".$request['manager_name']." from effective date of ". $CommonHelper->convertDateFomate($new_date)." by ".$new_time." at location ".$request['address']." </p> <a href=".$clients[0]->address_map_link.">Address Link</a>
            <p>Kindly read the attached client side working guidelines document.</p>
            <p>Thank you</p>";
 
            $geofence = "<b><p>Dear Pratap, </p></b>
            <p>".$resource[0]->fname.' '.$resource[0]->lname." will be reporting to ".$clients[0]->client_name." at location ".$request['address']." </p><a href=".$clients[0]->address_map_link.">Address Link</a>
            <p>Kindly change the geofencing for this person.</p>
            <p>His phone number is ".$resource[0]->phone." .</p>";
            
            return response()->json(['errors'=>'','accountemail'=>$accountemail,'employeeemail'=>$employeeemail,'geofence'=>$geofence,'document'=>$path]);
        }
    }

    function runDailyReminder(){

        $SettingRepo = new SettingRepo;
        $setting = $SettingRepo->show();
        $from = $setting[0]->from_email;
        $reminder_email = $setting[0]->reminder_email;
        $reminder_email = explode(',',$reminder_email);

        $CommonHelper = new CommonHelper;

        $ResouceRepo = new ResouceRepo;
        $resource = $ResouceRepo->getReminderDetails($setting[0]->reminder_days);
        
        $arrayList = '';
        $i = 0;
        foreach($resource as $value){
            
            $endData = $value->end_date;
            $arrayList .= "<p>Employee ".$value->fname.' '.$value->lname." tentative date is ".$CommonHelper->convertDateFomate($endData)." in project with ".$value->client_name.".</p>";
            $i++;
            
        }
        
        if($arrayList != ""){
            $bodyContain = "<b><p>Dear Sir/Madam</p></b>".
                        $arrayList.
                        "<p>Thank you</p>";
            Mail::to($reminder_email)
                    ->send(new nonjoiningemp(['body'=>$bodyContain,'from'=>$from,'subject'=>'Tentative End Date Reminder']));
        }
    }

    function runDailyReminderMonth(){
        $SettingRepo = new SettingRepo;
        $setting = $SettingRepo->show();
        $from = $setting[0]->from_email;
        $reminder_email2 = $setting[0]->reminder_email2;
        $reminder_email2 = explode(',',$reminder_email2);
        // echo $setting[0]->;

        $CommonHelper = new CommonHelper;

        $ResouceRepo = new ResouceRepo;
        $resource = $ResouceRepo->getReminderTenMonth($setting[0]->reminder_months);
        $arrayList = '';
        foreach($resource as $value){
            if($value->nonjoiningEndDate == ""){
                $arrayList .= "<p>Employee ".$value->fname.' '.$value->lname." completed 10 months in project with ".$value->client_name.".</p>";

            }
        }

        if($arrayList != ''){
            $bodyContain = "<b><p>Dear Sir/Madam</p></b>".
                        $arrayList.
                        "<p>Thank you</p>";
            Mail::to($reminder_email2)
                    ->send(new nonjoiningemp(['body'=>$bodyContain,'from'=>$from,'subject'=>'Successful completion of 10 months']));
        }
    }
}
