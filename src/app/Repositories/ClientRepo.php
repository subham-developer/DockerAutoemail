<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Session;
class ClientRepo 
{
	public function store($request)
	{	
		$client = new Client; // insert
		$client->client_name = $request->client;
		$client->reporting_name = $request->rname;
		$client->reporting_contact = $request->rphone;
		$client->reporting_email = $request->remail;
		$client->account_name = $request->aname;
		$client->account_email = $request->aemail;
		$client->hr_name = $request->hrname;
		$client->hr_contact = $request->hrphone;
		$client->hr_email = $request->hremail;
		$client->Interviewer_name = $request->iname;
		$client->Interviewer_contact = $request->iphone;
		$client->Interviewer_email = $request->iemail;
		$client->need_timesheet = $request->timesheet;
		$client->need_machine = $request->machine;
		$client->aggrement_sign = $request->working;
		$client->weekend_working = $request->Aggrement;
		$client->first_invoice = $request->Invoice;
		$client->url = $request->url;
		$client->address = $request->address;
		$client->address_map_link = $request->maplink;

		$client->is_invoice_need = $request->is_invoice_need;
		$client->invoice_date = $request->invoice_date;
		$client->credit_period = $request->credit_period;
		$client->gst = $request->gst;
		$client->pan = $request->pan;
		$client->billing_address = $request->billing_address;
		$client->operational_address = $request->operational_address;
		$client->pf_proof = $request->pf_proof;
		$client->tan = $request->tan;

		$res= $client->save();
		if($res)
		    {
		    	return 200;
		    }
		    else
		    {
		    	return 201;
		    }
	}
	public function show()
	{
		return $client = Client::whereDeleted(0)->get();
	}
	public function getcount()
	{
		return Client::whereDeleted(0)->count();
	}
	public function getclientdata($id)
	{
		$clients = Client::find($id);	
		return $clients;
	}
	public function update($request,$id)
	{
        $auctionerData            = Client::findOrFail($id);
        if ($auctionerData ) {  
			$client = Client::find($id);// update
			$client->client_name = $request->client;
			$client->reporting_name = $request->rname;
			$client->reporting_contact = $request->rphone;
			$client->reporting_email = $request->remail;
			$client->account_name = $request->aname;
			$client->account_email = $request->aemail;
			$client->hr_name = $request->hrname;
			$client->hr_contact = $request->hrphone;
			$client->hr_email = $request->hremail;
			$client->Interviewer_name = $request->iname;
			$client->Interviewer_contact = $request->iphone;
			$client->Interviewer_email = $request->iemail;
			$client->need_timesheet = $request->timesheet;
			$client->need_machine = $request->machine;
			$client->aggrement_sign = $request->working;
			$client->weekend_working = $request->Aggrement;
			$client->first_invoice = $request->Invoice;
			$client->url = $request->url;
			$client->address = $request->address;
			$client->address_map_link = $request->maplink;

			$client->is_invoice_need = $request->is_invoice_need;
			$client->invoice_date = $request->invoice_date;
			$client->credit_period = $request->credit_period;
			$client->gst = $request->gst;
			$client->pan = $request->pan;
			$client->billing_address = $request->billing_address;
			$client->operational_address = $request->operational_address;
			$client->pf_proof = $request->pf_proof;
			$client->tan = $request->tan;

			$client->save();
            if ($client) {
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

		$auctionerData            = Client::findOrFail($id);
		if ($auctionerData ) {               
			$client = Client::find($id);// update
			$client->deleted = '1';
			$client->save();
            if ($client) {
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

}