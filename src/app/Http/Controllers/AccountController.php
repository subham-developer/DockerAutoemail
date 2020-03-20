<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repositories\AccountRepo;
use Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AccountIndex');
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
            'name'=>'required|regex:/^[\pL\s]+$/u', 
            'phone'=>'required|Numeric|digits:10|unique:accounts,phone',
            'email'=>'required|Email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.).[a-z]{1,6}$/x|unique:accounts,email']);   
       $AccountRepo = new AccountRepo();
       $res = $AccountRepo->store($request);
       if($res == 200)
       {
        return redirect()->action('AccountController@show')->with('alert', 'Accountant Added Successfully!');
       }
       else
       {
        return redirect()->back()->with('alert', 'Something went wrong!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $AccountRepo = new AccountRepo();
        $res = $AccountRepo->show();
        return view('ViewAccountant',['Accountant' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AccountRepo = new AccountRepo();
        $res = $AccountRepo->getAccountantdata($id);
        return view('EditAccountant',['Accountant' => $res]);
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
            'name'=>'required|regex:/^[\pL\s]+$/u',
            'phone'=>'required|Numeric|digits:10|unique:accounts,phone,'.$id,
            'email'=>'required|Email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.).[a-z]{1,6}$/x|unique:accounts,email,'.$id]);
     
       $AccountRepo = new AccountRepo();
       $res = $AccountRepo->update($request,$id);
       if($res == 200)
       {
        return redirect()->action('AccountController@show')->with('alert', 'Accountant Updated Successfully!');
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
        $AccountRepo = new AccountRepo();
        $res = $AccountRepo->destroy($id);
        return $res;
    }
}
