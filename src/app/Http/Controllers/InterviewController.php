<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Repositories\InterviewRepo;
use App\Repositories\JoiningRepo;
use App\Repositories\ClientRepo;
use App\Repositories\ResouceRepo;
use App\Mail\sendmail;
use Session;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JoiningRepo = new JoiningRepo();
        $InterviewRepo = new InterviewRepo();
        $clients = $InterviewRepo->getclient(); 
        $resource = $JoiningRepo->getresource(['on_bench', 1]); 
        $setting = $InterviewRepo->getsetting();   

        return view('InterviewIndex',['clients' => $clients,'resources' => $resource,'setting' => $setting]);
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

    $InterviewRepo = new InterviewRepo();
    if (isset($request['interview_id']) && $request['interview_id'] > 0) {
        $res = $InterviewRepo->update($request,$request['interview_id']);
    }
    else{
        $res = $InterviewRepo->store($request);
    }

    $resource_dtl = $InterviewRepo->getresourcedtl($request['Resources']);
    $resource_dtl = $InterviewRepo->getresourcedtl($request['Resources']);
    $clientdtl = $InterviewRepo->getclientdtl($request['clients']);
    $setting = $InterviewRepo->getsetting(); 
    $cc_email = $setting[0]->cc_email;      
    $email = $resource_dtl[0]->email;
    $techhead_email = $setting[0]->tech_head_email;
    $sales_email = $setting[0]->salesperson;
    $content = $request['mailcontent'];
       // $ccmail1 = explode(',', $cc_email);
        // array_push($ccmail1, $sales_email);
        $ccmail2 = explode(',', $cc_email);
        array_push($ccmail2, $sales_email);
        array_push($ccmail2, $techhead_email);
       Mail::to($email)
       ->cc($ccmail2)
       ->send(new SendMail($content));
       return redirect()->back()->with('alert', 'interview Schedule!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $InterviewRepo = new InterviewRepo();
         $res = $InterviewRepo->show();
         $count = $InterviewRepo->getcount();

        return view('ViewInterviews',['interviewDtl' => $res,'totalcount' =>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $InterviewRepo = new InterviewRepo();
        $res = $InterviewRepo->getById($id);
        $clients = $InterviewRepo->getclient(); 
        $resource = $InterviewRepo->getresource();        
        $setting = $InterviewRepo->getsetting();

        //dd($res);
        return view('EditInterview',['clients' => $clients,'resources' => $resource,'setting' => $setting, 'old' => $res]);
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

    public function getdata(Request $request)
    {      
        $arr=[];
 
        $validator = Validator::make($request->all(),[
            'clients'=>'required', 
            'Resources'=>'required', 
            'date'=>'required', 
            'point_of_contact'=>'required', 
            'contact_no'=>'required|Numeric|digits:10',
            'mode'=>'required']);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors(),'data'=>'']);
            // return $validator->errors();
        }
        else
        {
            $old_date_timestamp = strtotime($request['date']);
            $new_date = date('Y-M-d H:i A', $old_date_timestamp); 
             $InterviewRepo = new InterviewRepo();
            $clients = $InterviewRepo->getclientdtl($request['clients']);       
            $resource = $InterviewRepo->getresourcedtl($request['Resources']);       
            $html = "<b><p>Dear ".$resource[0]->fname.' '.$resource[0]->lname."</p></b>
            <p>Your interview is scheduled on ".$new_date." at a client Side </p>
            <p>Client - ".$clients[0]->client_name."</p>
            <p>Contact Person - ".$request['point_of_contact']." - ".$request['contact_no']."</p>
            <p>Mode of interview - ".$request['mode']."</p>
            <p>Address - ".$request['address']."</p>
            <p>After your interview please send the interview questions to rahul@nimapinfotech.com</p>
            <a href=".$clients[0]->address_map_link.">Address Link</a>";
            return response()->json(['errors'=>'','data'=>$html]);
        }
       
       
    }
    public function getclientdetails(Request $request)
    {
        $ClientRepo = new ClientRepo();
        $res = $ClientRepo->getclientdata($request['id']);

        return $res;
    }

    public function view($id)
    {
        $InterviewRepo = new InterviewRepo();
        $res = $InterviewRepo->showById($id);
        if (isset($res[0]['datetime'])) {            
            $res[0]['datetime'] = date('d-M-Y h:i A',strtotime($res[0]['datetime']));
        }
        return response()->json(['msg'=>'Success','data'=>$res]);
    }
}
