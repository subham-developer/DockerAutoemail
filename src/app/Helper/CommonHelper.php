<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Session;
class CommonHelper 
{
	public function uploadfile($request)
	{
	    $doc = $request->file('resume');
	    $path = base_path(). '/public/docs/';
	    $path1 = '/docs/';
	    $ext = pathinfo($doc, PATHINFO_EXTENSION);
	    $filename = $request['fname'].'_'.$request['lname'].'_Resume.' . $doc->getClientOriginalExtension();
	    $doc->move($path, $filename);
	   	$docpath = $path1.$filename;
	   	return $docpath;
	}
	public function uploadfile1($file)
	{
	    // $doc = $request->file('file');
	    $path = base_path(). '/public/docs/';
	    $path1 = '/docs/';
	    $ext = pathinfo($file, PATHINFO_EXTENSION);
	    $filename = 'GuidelineDocs.' . $file->getClientOriginalExtension();
	    $file->move($path, $filename);
	   	$docpath = $path1.$filename;
	   	return $docpath;
	}

	function convertDateFomate($toconvertdate)
    {
        return date('d-M-Y',strtotime($toconvertdate));
    }
	
	public function uploadfileLogo($file)
	{
	    // $doc = $request->file('file');
	    $path = base_path(). '/public/docs/';
	    $path1 = '/docs/';
	    $ext = pathinfo($file, PATHINFO_EXTENSION);
		$filename = 'logo.' . $file->getClientOriginalExtension();
	    $file->move($path, $filename);
		   $docpath = $path1.$filename;
	   	return $docpath;
	}
}