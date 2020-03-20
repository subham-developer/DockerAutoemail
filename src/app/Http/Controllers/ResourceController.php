<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repositories\ResouceRepo;
use App\Helper\CommonHelper;
use Session;
class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ResourceRepo = new ResouceRepo();
      $res = $ResourceRepo->gettechnology();  
        return view('ResourceIndex',['technology' => $res]);
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

       $this->validate($request,[
            'fname'=>'required|max:50|regex:/^[\pL\s]+$/u', 
            'lname'=>'required|max:50|Alpha',
            'phone'=>'required|Numeric|digits:10|unique:resources,phone',
            'resident_address'=>'required|max:250',
            'exp_date'=>'required',
            'email'=>'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.).[a-z]{1,6}$/x|unique:resources,email',
            'language'=>'required',
            'otherlanguage'=>'required',
            'Resume_Type'=>'required',
            'resume'=>'required_if:Resume_Type,==,file|mimes:doc,pdf|max:2000',
            'resumelink'=>'required_if:Resume_Type,==,link'],[],[
                'fname' => 'first name',
                'lname' => 'last name',
                'otherlanguage' => 'other language',
                'resumelink' => 'resume link',
            ]);
       
        
       if($request['Resume_Type'] == "file")
       {
        $CommonHelper = new CommonHelper();
        $path = $CommonHelper->uploadfile($request);
       }
       else
       {
        $path = $request['resumelink'];
       }
       
       $ResourceRepo = new ResouceRepo();
       $res = $ResourceRepo->store($request,$path);
       if($res == 200)
       {
        return redirect()->action('ResourceController@show')->with('alert', 'Resource Added Successfully!');
       }
       else
       {
        return redirect()->back()->with('alert', $res);
       }

  }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ResourceRepo = new ResouceRepo();
        $res = $ResourceRepo->show();
         $count = $ResourceRepo->getcount();

        return view('ViewResource',['resources' => $res,'totalcount' =>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
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
            'fname'=>'required|max:50|regex:/^[\pL\s]+$/u', 
            'lname'=>'required|max:50|Alpha',
            'phone'=>'required|Numeric|digits:10|unique:resources,phone,'.$id,
            'email'=>'required|Email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.).[a-z]{1,6}$/x|unique:resources,email,'.$id,
            'language'=>'required',
            'resident_address'=>'required|max:250',
            'exp_date'=>'required',
            'otherlanguage'=>'required'],[],[
                'fname' => 'first name',
                'lname' => 'last name',
                'otherlanguage' => 'other language',
            ]);

     

        if($request['Resume_Type'] == "file")
       {

        $CommonHelper = new CommonHelper();
        $path = $CommonHelper->uploadfile($request);
       }
       elseif ($request['Resume_Type'] == "link") {
         $path = $request['resumelink'];
       }
       else
       {
        $path = "";
       }
     

       $ResourceRepo = new ResouceRepo();
       $res = $ResourceRepo->update($request,$path,$id);
       if($res == 200)
       {
        return redirect()->action('ResourceController@show')->with('alert', 'Resource Updated Successfully!');
       }
       else
       {
        return redirect()->back()->with('alert',$res);
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
       $ResourceRepo = new ResouceRepo();
       $res = $ResourceRepo->destroy($id);
       return $res;
    }
     public function editpage($id)
    {
        $ResourceRepo = new ResouceRepo();
        $res = $ResourceRepo->getuserdata($id);
        if(!empty($res)){
          $res1 = $ResourceRepo->gettechnology();
          return view('EditResource',['resources' => $res,'technology' => $res1]);
        }else{
          return redirect()->back()->with('alert', 'Wrong resource id wrong!');
        }
    }
}
