<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Nonjoining;
use App\Models\Client;
use App\Models\Resource;
use App\Models\Joining;
use Session;
use DB;
class NonjoiningRepo 
{
	public function store($request)
	{
		//Get last data from joining
		$Joining = Joining::select('id')
							->where('client_id', $request->clients)
							->where('resource_id', $request->Resources)
							->where('deleted', 0)
							->orderBy('id', 'desc')
							->limit(1)
							->get();

		//Change status to delete
		Joining::where('id', $Joining[0]->id)
							->update([
								'deleted' => 1
							]);

		//Change status from joining to branch
		Resource::where('id', $request->Resources)
							->update([
								'on_bench' => 1
							]);

		$Nonjoining = new Nonjoining; // insert
		$Nonjoining->resource = $request->Resources;
		$Nonjoining->clients = $request->clients;
		$Nonjoining->end_date = $request->enddate;
		$Nonjoining->joining_id = $Joining[0]->id;
		$Nonjoining->save();

		/*Joining::where('resource_id', $request->Resources)
          ->where('client_id', $request->clients)
          ->update(['deleted' => 1]);*/

	}
	public function show()
	{
		return $Account = Account::whereDeleted(0)->get();
		// return $client = Client::whereDeleted(0)->get();
	}
	public function getclient()
	{

		// return Client::whereDeleted(0)->get();	
		return Client::where('Deleted', 0)->orderBy('client_name')->pluck('client_name', 'id');
		
		
	}
	public function getresource()
	{
		return resource::select('id', DB::raw('CONCAT(fname, " ", lname) AS full_name'))->where('Deleted', 0)->orderBy('fname')->pluck('full_name', 'id');
		
	}

	public function getJoinResources(){
		$result  = DB::table('joinings')
		->join('resources','joinings.resource_id', '=', 'resources.id')
		->select('resources.id', DB::raw('CONCAT(resources.fname, " ",resources.lname) AS full_name'))
		->where('joinings.deleted',0)
		->get();
		$res = json_decode($result);
		return $res;
	}

	public function getNonJoinResources($id=NULL){
		if (!is_null($id) && $id > 0) {
			$result  = DB::table('nonjoinings')
						->join('resources','nonjoinings.resource', '=', 'resources.id')
						->join('clients','nonjoinings.clients', '=', 'clients.id')
						->join('joinings','joinings.id', '=', 'nonjoinings.joining_id')
						->where('nonjoinings.id',$id)
						->get();
		}
		else{
			$result  = DB::table('nonjoinings')
						->join('resources','nonjoinings.resource', '=', 'resources.id')
						->join('clients','nonjoinings.clients', '=', 'clients.id')
						->select('clients.client_name','resources.lname','resources.fname','nonjoinings.id','nonjoinings.end_date')
						->get();
		}
		
		return $result;
	}

	function getJoiniedResources($arrayList = array()){
		if(empty($arrayList)){
			return DB::table('resources')
						->select('resources.id', DB::raw('CONCAT(resources.fname, " ", resources.lname) AS full_name'))
						->where([['resources.Deleted', 0]])
						->get();
		}
		else{
			return DB::table('resources')
						->join('joinings', 'joinings.resource_id', '=', 'resources.id')
						->select('resources.id', DB::raw('CONCAT(resources.fname, " ", resources.lname) AS full_name'),'joinings.client_id','joinings.id as joiningId')
						->where([['resources.Deleted', 0],['joinings.deleted',0],$arrayList])
						->get();
		}
	}

	public function getjoinclient($id)
	{
		//dd($id);
		$result  = DB::table('joinings')
						->join('clients','joinings.client_id', '=', 'clients.id')
						->select('clients.id', 'clients.client_name')
						->where('joinings.resource_id', $id)
						->get();
		return $result;	
	}

	public function getjoinclientName($id)
	{
		//dd($id);
		$result  = DB::table('clients')
						->select('clients.id', 'clients.client_name')
						->where('clients.id', $id)
						->get();
		return $result;	
	}

	public function update($request,$id)
	{
		$Nonjoining = new Nonjoining; // insert
		$updArr = [
			'resource' => $request->Resources,
			'clients' => $request->clients,
			'end_date' => $request->enddate
		];
									
		$res= NonJoining::where('id',$id)->update($updArr);
	
	}
	public function destroy($id)
	{
		
	}

	function getNonjoiningRepoDetails($joiningId){
		return DB::table('joinings')
					->select('resources.fname','resources.lname','resources.phone','clients.client_name','clients.reporting_name','clients.address_map_link','clients.address','joinings.start_date')
					->leftJoin('clients','clients.id','=','joinings.client_id')
					->leftJoin('resources','resources.id','=','joinings.resource_id')
					->where('joinings.id',$joiningId)
					->get();
	}

}