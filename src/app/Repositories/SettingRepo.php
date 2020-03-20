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
class SettingRepo 
{
	public function store($request)
	{
		
	}
	public function show()
	{
		// return  Interview::whereDeleted(0)->get();
		return $Setting = Setting::whereDeleted(0)->get();
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
	public function update($request,$id, $fileName='')
	{
		 $auctionerData            = Setting::findOrFail($id);
            if ($auctionerData ) {                
				$Setting = Setting::find($id);// update
				$Setting->address = $request->Address;
				$Setting->contact = $request->contact;
				$Setting->accountant_email = $request->accountant_email;
				$Setting->cc_email = $request->cc_email;
				$Setting->salesperson = $request->salesperson;
				$Setting->from_email = $request->from_email;
				$Setting->tech_head_email = $request->tech_head_email;
				$Setting->geofence_email = $request->geofence_email;
				$Setting->reminder_email = $request->reminder_email;
				$Setting->reminder_days = $request->reminder_days;
				$Setting->reminder_email2 = $request->reminder_email2;
				$Setting->reminder_months = $request->reminder_months;

				if($fileName != ''){
					$Setting->logo = $fileName;
				}

				$Setting->save();
            if ($Setting) {
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
	public function destroy($id)
	{
		
	}

}