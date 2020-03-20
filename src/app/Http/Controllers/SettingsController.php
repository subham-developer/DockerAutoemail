<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Repositories\SettingRepo;
use App\User;
use App\Helper\CommonHelper;


use Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SettingRepo = new SettingRepo();
        $settings = $SettingRepo->getclient();

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


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $SettingRepo = new SettingRepo();
         $res = $SettingRepo->show();

        $userList = User::all();
        $user_login_id = \Session::get('user_login_id');
        // dd($user_login);

        return view('ViewSettings',['settingDTL' => $res, 'userList' => $userList, 'user_login_id' => $user_login_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SettingRepo = new SettingRepo();
        $res = $SettingRepo->getsetting($id);
        return view('Editsettings',['settings' => $res]);
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
                $this->validate($request,[ 
                    'Address'=>'required',
                    'contact'=>'required',
                    'accountant_email'=>'required',
                    'cc_email'=>'required',
                    'salesperson'=>'required',
                    'from_email'=>'required',
                    'tech_head_email'=>'required',
                    'geofence_email'=>'required',
                    'reminder_email'=>'required',
                    'reminder_days'=>'required|numeric',
                    'reminder_email2'=>'required',
                    'reminder_months'=>'required|numeric',
            ]);

            $logoId = '';
            $CommonHelper = new CommonHelper();
            if(isset($_FILES['logo']['error']) && $_FILES['logo']['error'] == 0){
                $logoId = $CommonHelper->uploadfileLogo($request['logo']);
            }
        $SettingRepo = new SettingRepo();
        $res = $SettingRepo->update($request,$id, $logoId);
           if($res == 200)
           {
            return redirect()->action('SettingsController@show')->with('alert', 'Settings Updated Successfully!');
           }
           else
           {
            return redirect()->back()->with('alert', 'Something went wrong!');
           }
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
    public function getdata($id)
    {      
        $SettingRepo = new SettingRepo();
        $res = $SettingRepo->getsetting($id);
        return response()->json(['msg' =>'Success','settings' => $res]);
    }
    public function getclientdetails(Request $request)
    {
        $ClientRepo = new ClientRepo();
        $res = $ClientRepo->getclientdata($request['id']);

        return $res;
    }


    function jsonOutput($code = 400, $message = 'Error', $data = array()){
    	$output = new \stdclass;
    	$output->code = $code;
    	$output->message = $message;
    	if(is_array($data)){
    		$output->data = $data;
    	}
    	return json_encode($output);
    }

    function addlogin(Request $request){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $formValidation = User::where('email',$request->email)->get();
        if(isset($formValidation[0]->email)){
        	return $this->jsonOutput(400,'Duplicate email address found');
        }

        $Setting = new User;
        $Setting->name = $request->name;
        $Setting->email = $request->email;
        $result = $Setting->save();
        
        if($result > 0){
        	return $this->jsonOutput(200,'Login email added successfully',['id' => 0, 'name' => $request->name, 'email' => $request->email, 'lastId' => $Setting->id]);
        }
        else{
        	return $this->jsonOutput(400,'Unable to insert');
        }
    }

    function updateLogin(Request $request){
        $validator = Validator::make(request()->all(), [
            'id' => 'required|numeric',
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $formValidation = User::where('email',$request->email)->where('id','!=',$request->id)->get();
        if(isset($formValidation[0]->email)){
        	return $this->jsonOutput(400,'Duplicate email address found');
        }

        $Setting = User::find($request->id);
        $Setting->name = $request->name;
        $Setting->email = $request->email;
        $result = $Setting->save();
        
        if($result > 0){
        	return $this->jsonOutput(200,'Login email updated successfully',['id' => $request->id, 'name' => $request->name, 'email' => $request->email]);
        }
        else{
        	return $this->jsonOutput(400,'Unable to update');
        }
    }

    function deleteLogin(Request $request){
        $validator = Validator::make(request()->all(), [
            'id' => 'required|numeric',
        ]);

        if($validator->fails()){
            $errorMessage = $validator->errors()->all();
            return $this->jsonOutput(400, $errorMessage[0]);
        }

        $user_login_id = \Session::get('user_login_id');

        $formValidation = User::all();
        if($formValidation->count() == 1){
        	return $this->jsonOutput(400,'Unable to delete last email address');
        }
        else if($user_login_id == $request->id){
        	return $this->jsonOutput(400,'Something went wrong please try again later');
        }

        $Setting = User::destroy($request->id);
        
        if($Setting > 0){
        	return $this->jsonOutput(200,'Login email deleted successfully',['id' => $request->id, 'email' => '' ]);
        }
        else{
        	return $this->jsonOutput(400,'Unable to update');
        }
    }
}
