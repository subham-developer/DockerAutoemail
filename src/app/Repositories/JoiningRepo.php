<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Joining;
use App\Models\Client;
use App\Models\Resource;
use App\Models\Setting;
use Session;
use DB;
class JoiningRepo 
{
	public function store($request)
	{

		$Joining = new Joining; // insert
		$Joining->resource_id 		= $request->Resources;
		$Joining->client_id 		= $request->clients;
		$Joining->date_of_invoice 	= $request->ivdate;
		$Joining->start_date 		= $request->strdate;
		$Joining->end_date 			= $request->enddate;
		$Joining->creadit_period 	= $request->creperiod;
		$Joining->contract_type		= $request->contracttype;
		$res= $Joining->save();

		Client::where('id',$request->clients)->update(['invoice_client' => 1]);
		return $res;
	}

	public function show()
	{
	// $result = Joining::whereDeleted(0)->count();
	$result = DB::table('joinings')
				->join('clients', 'joinings.client_id', '=', 'clients.id')
	   			->join('resources', 'joinings.resource_id', '=', 'resources.id')
	   			->where('joinings.deleted',0)
	   			->select('clients.client_name', 'resources.fname','resources.lname' ,'joinings.start_date','joinings.end_date','joinings.id','joinings.creadit_period','joinings.date_of_invoice')
	   // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
	   ->get();
	   $res = json_decode($result, true);
	   return $res;
	}
	// public function show()
	// {
	// $result = Joining
    // ::join('clients', 'Joinings.client_id', '=', 'clients.id')
    // ->join('resources', 'Joinings.resource_id', '=', 'resources.id')
    // ->select('clients.client_name', 'resources.fname','resources.lname' ,'joinings.start_date','joinings.end_date','joinings.id','joinings.creadit_period','joinings.date_of_invoice')
    // // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
    // ->get();
    // return $result;
	// }
	public function getcount()
	{
		return Joining::whereDeleted(0)->count();
	}
	public function getclient()
	{
		return Client::where('Deleted', 0)->orderBy('client_name')->pluck('client_name', 'id');
	}
	public function getresource($arrayList = array())
	{
		if(empty($arrayList)){
			return resource::select('id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
							->where([['Deleted', 0]])
							->orderBy('fname')
							->pluck('full_name', 'id');	
		}
		else{
			return resource::select('id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
							->where([['Deleted', 0],$arrayList])
							->orderBy('fname')
							->pluck('full_name', 'id');
		}
		
		
	}
	public function getresource1()
	{
	return Resource::leftjoin('joinings', 'resources.id', '=', 'joinings.resource_id')
		->select('resources.id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))
		->where([['resources.deleted', '=', 0]])->whereNull('joinings.resource_id')->orderBy('resources.fname')->pluck('full_name', 'resources.id');
	
	}
	public function update($request,$id)
	{
		$Joining = new Joining; // insert
		$updArr = [
			'resource_id' 		=> $request->Resources,
			'client_id' 		=> $request->clients,
			'date_of_invoice' 	=> $request->ivdate,
			'start_date' 		=> $request->strdate,
			'end_date' 			=> $request->enddate,
			'creadit_period' 	=> $request->creperiod,
			'contract_type'		=> $request->contracttype
		];
									
		$res= Joining::where('id',$id)->update($updArr);
	}
	public function destroy($id)
	{
		
	}
	public function getjoininigDtl($empid,$clientid,$type = '')
	{
		if($type == "edit"){
			$result =  Joining::where([
				['client_id', '=', $clientid],
				['resource_id', '=', $empid]
			])->get();
		}
		else{
			$result =  Joining::where([
				['deleted', '=', 0],
				['client_id', '=', $clientid],
				['resource_id', '=', $empid]
			])->get();
		}
		
		return $result;
	}

	public function getJoining($id)
	{
		$joinings = Joining::join('resources', 'resources.id', '=', 'joinings.resource_id')->join('clients', 'clients.id', '=', 'joinings.client_id')->where([['joinings.id', '=', $id]])->get(['joinings.id as jid','joinings.*','resources.*','clients.*']);
		return $joinings;
	}

}