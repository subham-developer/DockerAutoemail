<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Resource extends Model
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

  	    
    }
}
