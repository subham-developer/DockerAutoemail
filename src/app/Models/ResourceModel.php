<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ResourceModel extends Model
{
    public function add_resource($request)
    {
    	/*Store document and save path in db*/
    	$doc = $request->file('resume');    
	    $path = public_path(). '/docs/';
	    $ext = pathinfo($doc, PATHINFO_EXTENSION);
	    $filename = $request['fname'].'_'.$request['lname'].'_Resume.' . $doc->getClientOriginalExtension();
	    $doc->move($path, $filename);
	   	$docpath = $path.$filename;

    	$check = DB::table('resource')->select('phone', 'email')->where('phone', '=', $request['phone'])-> orWhere('email', '=', $request['email'])->count();
    
    	if($check == 0)
    	{    	
	    	$res = DB::table('resource')->insert(
		    ['fname' => $request['fname'], 'lname' => $request['lname'],'phone'=>$request['phone'],'email'=>$request['email'],'language'=>$request['language'],'otherlanguage'=>$request['otherlanguage'],'resume'=>$docpath]
		    );
		    if($res)
		    {
		    	return 200;
		    }
		    else
		    {
		    	return 201;
		    }
    	}
    	else
    	{
    		return 202;
    	}
    }
}
