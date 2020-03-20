<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repositories\TechnologieRepo;
use Session;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TechnologyIndex');
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
            'name'=>'required']);   
       $TechnologieRepo = new TechnologieRepo();
       $res = $TechnologieRepo->store($request);
       if($res == 200)
       {
        return redirect()->action('TechnologyController@show')->with('alert', 'Technology Added Successfully!');
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
       $TechnologieRepo = new TechnologieRepo();
       $res = $TechnologieRepo->show();
       return view('ViewTechnology',['Technology' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TechnologieRepo = new TechnologieRepo();
        $res = $TechnologieRepo->getTechdata($id);
        return view('EditTechnology',['Technology' => $res]);
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
            'name'=>'required']);
        $TechnologieRepo = new TechnologieRepo();
           $res = $TechnologieRepo->update($request,$id);
           if($res == 200)
           {
            return redirect()->action('TechnologyController@show')->with('alert', 'Technology Updated Successfully!');
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
        $TechnologieRepo = new TechnologieRepo();
        $res = $TechnologieRepo->destroy($id);
        return $res;
    }
}
