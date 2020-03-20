<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Interview;
use App\Models\Client;
use App\Models\Resource;
use App\Models\Setting;
use Session;
use DB;
class InterviewRepo 
{
	public function store($request)
	{
		$Interview = new Interview;
		$Interview->client = $request->clients;
		$Interview->resource = $request->Resources;
		$Interview->contact_person = $request->point_of_contact;
		$Interview->contact = $request->contact_no;
		$Interview->datetime = $request->date;
		$Interview->mode = $request->mode;
		$Interview->location = $request->inv_loc;
		$Interview->address = $request->inv_addr;
		$res= $Interview->save();
	}

	public function show()
	{
		// return  Interview::whereDeleted(0)->get();
		$result = DB::table('interviews')
		->join('clients', 'interviews.client', '=', 'clients.id')
		->join('resources', 'interviews.resource', '=', 'resources.id')
		->select( 'clients.client_name','resources.fname','resources.lname' ,'interviews.datetime','interviews.mode','interviews.id','interviews.address')
		// ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
		->get();
		$res = json_decode($result, true);
		return $res;
	}
	// public function show()
	// {
	// 	// return  Interview::whereDeleted(0)->get();
	// 	$result = Interview
    // ::join('clients', 'Interviews.client', '=', 'clients.id')
    // ->join('resources', 'Interviews.resource', '=', 'resources.id')
    // ->select('clients.client_name', 'resources.fname','resources.lname' ,'Interviews.datetime','Interviews.mode','Interviews.id','Interviews.address')
    // // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
    // ->get();
    // return $result;
	// }

	public function showById($id)
	{
		// return  Interview::whereDeleted(0)->get();
		$result = DB::table('interviews')
		->join('clients', 'interviews.client', '=', 'clients.id')
		->join('resources', 'interviews.resource', '=', 'resources.id')
		->select( 'clients.client_name','resources.fname','resources.lname' ,'interviews.datetime','interviews.mode','interviews.id','interviews.address')
		->where('interviews.id', '=', $id)
		->get();
		$res = json_decode($result, true);
		return $res;
	}

	public function getcount()
	{
		return Interview::whereDeleted(0)->count();
	}
	public function getAccountantdata($id)
	{
		
	}
	public function getclient()
	{
		// return Client::whereDeleted(0)->get();	
		return Client::where('Deleted', 0)->orderBy('client_name')->pluck('client_name', 'id');
		
	}
	public function getsetting()
	{
		// return Client::whereDeleted(0)->get();	
		return $Setting = Setting::whereDeleted(0)->get();
		
	}
	public function getclientdtl($id)
	{
			return DB::table('clients')
                ->where('Deleted', '=', 0)
                ->where('id', '=', $id)
                ->get();
		
	}
	public function getresourcedtl($id)
	{
			return DB::table('resources')
                ->where('Deleted', '=', 0)
                ->where('id', '=', $id)
                ->get();
		
	}
	public function getresource()
	{
		return resource::select('id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))->where('Deleted', 0)->orderBy('fname')->pluck('full_name', 'id');
	}
	public function getresource1()
	{
	
		return Resource::leftjoin('joinings', 'resources.id', '=', 'joinings.resource_id')
		->select('resources.id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
		->where([['resources.deleted', '=', 0]])->whereNull('joinings.resource_id')->orderBy('resources.fname')->pluck('full_name', 'resources.id');
	}

	public function getresource2($id)
	{
	// $currentdate = date("Y-m-d");
	// 	return resource::join('nonjoinings', 'resources.id', '=', 'nonjoinings.resource')
	// 	->select('resources.id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))->where([
 //    ['resources.deleted', '=', 0],
 //    ['nonjoinings.end_date', '<=', $currentdate]])->orderBy('fname')->pluck('full_name', 'id');

		DB::enableQueryLog();

		$result =  resource::leftjoin('joinings', 'resources.id', '=', 'joinings.resource_id')
		->select('resources.id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
		->where([['resources.deleted', '=', 0]])
		->orderBy('resources.fname')
		->pluck('full_name', 'resources.id');
		
		$res =  resource::select('id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
				->where('Deleted', 0)
				->where('id', $id)
				->orderBy('fname')
				->pluck('full_name', 'id');
				dd($res);

		/*$f_res = array_push(json_decode($result), json_decode($res));
		$query = DB::getQueryLog();
		echo "<pre>";
		print_r($result);
		print_r($res);
		exit;*/
	}

	public function update($request,$id)
	{
		$Interview = new Interview;
		$updArr = [
			'client' => $request->clients,
			'resource' => $request->Resources,
			'contact_person' => $request->point_of_contact,
			'contact' => $request->contact_no,
			'datetime' => $request->date,
			'mode' => $request->inv_mode,
			'location' => $request->inv_loc,
			'address' => $request->inv_addr
		];
		
		$res= Interview::where('id',$id)->update($updArr);
	}
	public function destroy($id)
	{
		
	}

	public function getById($id)
	{
		$result = DB::table('interviews')
		->join('clients', 'interviews.client', '=', 'clients.id')
		->join('resources', 'interviews.resource', '=', 'resources.id')
		->where('interviews.id',$id)
		->select( 'clients.client_name','clients.id as client','resources.fname','resources.id as resource','resources.lname' ,'interviews.datetime','interviews.mode','interviews.id','interviews.address','interviews.contact','interviews.contact_person','interviews.location')
		->get();
		return $result;
		//dd($result);
		//return Interview::where('id', $id)->first();
	}



}