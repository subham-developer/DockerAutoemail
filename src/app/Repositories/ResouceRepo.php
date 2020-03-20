<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Resource;
use App\Models\Technologie;
use App\Models\Joining;
use Illuminate\Database\QueryException;

use Session;
class ResouceRepo 
{
	public function store($request,$path)
	{
		try{
			$resource = new Resource; // insert
			$lang=  implode(",",$request->language);
			// $resource = Resource::find($id);// update
			$resource->fname = $request->fname;
			$resource->lname = $request->lname;
			$resource->phone = $request->phone;
			$resource->email = $request->email;
			$resource->refer_no = $request->resource_ref;
			$resource->language = $lang;
			$resource->resume_type = $request->Resume_Type;
			$resource->otherlanguage = $request->otherlanguage;
			$resource->exp_date = $request->exp_date;
			$resource->resident_address = $request->resident_address;
			$resource->resume = $path;
			$res= $resource->save();
			if($res)
			    {
			    	return 200;
			    }
			    else
			    {
			    	return 201;
			    }
		}
		catch(Exception $e){
			report($e);
			//dd($e->getMessage());
		}
		
	}
	public function show()
	{
		$res=[];
		$Resource = Resource::whereDeleted(0)->get();
	
		foreach ($Resource as $key => $value) {
			$res[$key]['id']= $value['id'];
			$res[$key]['fname']= $value['fname'];
			$res[$key]['lname']= $value['lname'];
			$res[$key]['phone']= $value['phone'];
			$res[$key]['email']= $value['email'];
			$res[$key]['otherlanguage']= $value['otherlanguage'];
			$res[$key]['resume']= $value['resume'];
			$res[$key]['resume_type']= $value['resume_type'];
			$langid = explode(',', $value['language']);

			$language = Technologie::whereIn('id', $langid)->get();
			$lang="";
			foreach ($language as $keys => $values) {
				$lang .= $values['technology'].',';

			}
			$trim = rtrim($lang, ',');
			$res[$key]['language'] = $trim;

			$result  = joining::where('resource_id',$value['id'])
			->join('clients','joinings.client_id', '=', 'clients.id')
			->select('clients.client_name')->first();

			if (!empty($result)) {
				$res[$key]['resource_status'] = $result->client_name;
			}else{
				$res[$key]['resource_status'] = "Bench";
			}		
		}
	return $res;
	}
	public function getcount()
	{
		return Resource::whereDeleted(0)->count();
	}
	public function gettechnology()
	{
		// return $technology = Technologie::whereDeleted(0)->get();
		return Technologie::where('Deleted', 0)->orderBy('technology')->pluck('technology', 'id');
		// return $client = Client::whereDeleted(0)->get();
	}
	public function getuserdata($id)
	{
		$resource = Resource::where('Deleted', 0)->find($id);	
		return $resource;
	}
	public function update($request,$path,$id)
	{
		try{
	        	$auctionerData  = Resource::findOrFail($id);
	            if ($auctionerData ) {                
	                
	            	$lang=  implode(",",$request->language);
				$resource = Resource::find($id);// update
				$resource->fname = $request->fname;
				$resource->lname = $request->lname;
				$resource->phone = $request->phone;
				$resource->email = $request->email;
				$resource->refer_no = $request->resource_ref;
				$resource->language = $lang;
				$resource->otherlanguage = $request->otherlanguage;
				$resource->exp_date = $request->exp_date;
				$resource->resident_address = $request->resident_address;
				
				if($path != "")
				{
				$resource->resume_type = $request->Resume_Type;
				$resource->resume = $path;
				}
				$resource->save();
	            if ($resource) {
	                   return 200;
	                }
	                else{
	                   return 201;
	                }
	            }
	            else{
	               abort(404);
	            }
	        }
	    catch(QueryException $e){
	    	$message = $this->customError($e->getMessage());
	    }

	    return $message;
	}

	public function customError($message){
		if ($message) {
			$errArr = explode(' ',$message);
			return $errArr[5].' '.$errArr[6].' '.$errArr[8].' '.$errArr[7].' in field '.$errArr[10];
		}

	}
	public function destroy($id)
	{
		$auctionerData  = Resource::findOrFail($id);
		if ($auctionerData ) {               
			$resource = Resource::find($id);// update
			$resource->deleted = '1';
			$resource->save();
            if ($resource) {
                   return 200;
                }
                else{
                   return 201;
                }
            }
            else{
               abort(404);
            }
	}

	function updateOnBenchStatus($resourceId){
		$resourceData  = Resource::findOrFail($resourceId);
		$resourceData->on_Bench = '0';
		$resourceData->save();
	}

	function getReminderDetails($days){
		// echo date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$days.' days'));
		return Resource::select('resources.email','resources.fname','resources.lname','joinings.end_date','clients.client_name','clients.reporting_name')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('clients','clients.id','=','joinings.client_id')
						->where('joinings.end_date', '=', date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$days.' days')))
						->get();
	}

	function getReminderTenMonth($month){
		// echo date('Y-m-d', strtotime(date('Y-m-d'). ' - '.($month*30).' days'));
		return Resource::select('resources.email','resources.fname','resources.lname','joinings.start_date','clients.client_name','clients.reporting_name','nonjoinings.end_date as nonjoiningEndDate')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('clients','clients.id','=','joinings.client_id')
						->leftJoin('nonjoinings','nonjoinings.joining_id','=','joinings.id')
						->where('joinings.start_date', '=', date('Y-m-d', strtotime(date('Y-m-d'). ' - '.($month*30).' days')))
						->get();
	}

}