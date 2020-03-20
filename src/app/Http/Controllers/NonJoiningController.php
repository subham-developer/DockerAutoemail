<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Repositories\NonjoiningRepo;
use App\Repositories\ClientRepo;
use App\Repositories\ResouceRepo;
use App\Repositories\InterviewRepo;
use App\Repositories\JoiningRepo;
use App\Mail\nonjoiningaccountmail;
use App\Mail\nonjoiningemp;
use App\Mail\nonjoininggeofence;
use App\Helper\CommonHelper;
use Session;

class NonJoiningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NonjoiningRepo = new NonjoiningRepo();
        $resources = $NonjoiningRepo->getJoiniedResources(['on_bench','0']);
        $clients = $NonjoiningRepo->getclient(); 
        $resource = json_decode(json_encode($resources), true);
        // dd($resource);
        return view('NonjoiningIndex',['resources' => $resource]);
    }

    public function getclientname(Request $request)
    {
        $ResourceRepo = new NonjoiningRepo();
        return $ResourceRepo->getjoinclientName($request['clientid']);
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
        $NonjoiningRepo = new NonjoiningRepo();
        if (isset($request['nonjoinid'])) {
            $res = $NonjoiningRepo->update($request,$request['nonjoinid']);
        }
        else{
            $res = $NonjoiningRepo->store($request);
        }
        
        $InterviewRepo = new InterviewRepo();
        $resource_dtl = $InterviewRepo->getresourcedtl($request['Resources']);
        $clientdtl = $InterviewRepo->getclientdtl($request['clients']);
        $setting = $InterviewRepo->getsetting();  
        // return redirect()->back()->with('alert', 'NonJoining Mail Send..!');    
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
        $content = array('body'=>$accountemailbody,'from'=>$from);
        $content1 = array('body'=>$empemail,'from'=>$from);
        $content2 = array('body'=>$geofence,'from'=>$from);

        $ccmail1 = explode(',', $cc_email);
        array_push($ccmail1, $sales_email);
        $ccmail2 = explode(',', $cc_email);
        array_push($ccmail2, $sales_email);
        array_push($ccmail2, $techhead_email);

       Mail::to($accountant_email)
       ->cc($ccmail1)
       ->send(new nonjoiningaccountmail($content));

       Mail::to($emp_email)
       ->cc($ccmail2)
       ->send(new nonjoiningemp($content1));

       Mail::to($geofence_email)
       ->cc($ccmail1)
       ->send(new nonjoininggeofence($content2));

       return redirect()->back()->with('alert', 'Non-Joining Mail Send..!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $NonjoiningRepo = new NonjoiningRepo();
        $res   = $NonjoiningRepo->getNonJoinResources();
        return view('ViewNonJoining',['nonjoiningDtl' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPage($id)
    {
        $NonjoiningRepo = new NonjoiningRepo();
        $resources = $NonjoiningRepo->getJoiniedResources();
        $clients = $NonjoiningRepo->getclient(); 
        $nonjoiningres   = $NonjoiningRepo->getNonJoinResources($id);
        // $resource = json_decode(json_encode($resources), true);
        // dd($nonjoiningres);
        return view('EditNonjoining',['nonjoiningres'=>$nonjoiningres,'nonjoiningresid' => $id]);
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
    public function sendnonjoiningdata(Request $request)
    {  
        $arr=[];
        
        $validator = Validator::make($request->all(),[
            'Resources'=> 'required',
            'clientid' => 'required', 
            'joinid' => 'required', 
            'end_date' => 'required'
            ]);

        if ($validator->fails())
        {   
            return response()->json(['errors'=>$validator->errors(),'data'=>'']);
            // return $validator->errors();
        }
        else
        {   
            $CommonHelper = new CommonHelper();  
            $old_date_timestamp = strtotime($request['end_date']);
            $new_date = date('d-M-Y', $old_date_timestamp);

            $NonjoiningRepo = new NonjoiningRepo;
            $allDetails = $NonjoiningRepo->getNonjoiningRepoDetails($request->joinid);
            // dd($allDetails);

            $InterviewRepo = new InterviewRepo();
            $clients = $InterviewRepo->getclientdtl($request['clientid']);
            $resource = $InterviewRepo->getresourcedtl($request['Resources']);
            // $JoiningRepo = new JoiningRepo();

            // if(isset($request->edit)){
            //     $joiningDTL = $JoiningRepo->getjoininigDtl($request['Resources'],$request['clientid'], 'edit');
            // }
            // else{
            //     $joiningDTL = $JoiningRepo->getjoininigDtl($request['Resources'],$request['clientid']);
            // }
            
            $accountemail = "<b><p>Dear accounts</p></b>
            <p>Please note that ".$allDetails[0]->fname.' '.$allDetails[0]->lname." is getting released from ".$allDetails[0]->client_name." from effective date of ".$CommonHelper->convertDateFomate($allDetails[0]->start_date).".  Last date is ".$CommonHelper->convertDateFomate($request['end_date']).".</p>
            <p>Kindly ask the salesguy other billing details.</p>";

            $employeeemail = "<b><p>Dear ".$allDetails[0]->fname.' '.$allDetails[0]->lname."</p></b>
            <p>Your last date is ".$CommonHelper->convertDateFomate($request['end_date'])." in project with ".$allDetails[0]->client_name." Please give smooth  handover with approval ".$allDetails[0]->reporting_name." & report to Nimap office from next working day. </p>
            <p>Thank you</p>";
 
            $geofence = "<b><p>Dear Pratap</p></b>
            <p>".$allDetails[0]->fname.' '.$allDetails[0]->lname." will be released from ".$allDetails[0]->client_name." at location ".$allDetails[0]->address." </p> / <a href=".$allDetails[0]->address_map_link.">Address Link</a>
            <p>Kindly remove the geofencing for this person. </p>
            <p>His phone number is ".$allDetails[0]->phone." .</p>";
            
            return response()->json(['errors'=>'','accountemail'=>$accountemail,'employeeemail'=>$employeeemail,'geofence'=>$geofence]);
        }
    }

    
}
