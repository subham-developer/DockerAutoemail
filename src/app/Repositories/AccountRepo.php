<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Session;
class AccountRepo 
{
	public function store($request)
	{
		$Account = new Account; // insert
		$Account->name = $request->name;
		$Account->phone = $request->phone;
		$Account->email = $request->email;
		$res= $Account->save();

		// dd($resource->id);
		// print_r($res); 
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
		return $Account = Account::whereDeleted(0)->get();
		// return $client = Client::whereDeleted(0)->get();
	}
	public function getAccountantdata($id)
	{
		$Account = Account::find($id);	
		return $Account;
	}
	public function update($request,$id)
	{

		// $userData            = User::findOrFail(Auth::id());	
        $auctionerData            = Account::findOrFail($id);
            if ($auctionerData ) {                
         
			$account = Account::find($id);// update
			$account->name = $request->name;
			$account->phone = $request->phone;
			$account->email = $request->email;
			$account->save();
            if ($account) {
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
		$auctionerData            = Account::findOrFail($id);
		if ($auctionerData ) {               
			$Account = Account::find($id);// update
			$Account->deleted = '1';
			$Account->save();
            if ($Account) {
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