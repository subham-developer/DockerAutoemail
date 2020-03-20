<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Technologie;
use Session;
class TechnologieRepo 
{
	public function store($request)
	{
		$technologie = new Technologie; // insert
		$technologie->technology = $request->name;
		$res= $technologie->save();

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
		return $Technologie = Technologie::whereDeleted(0)->get();
		// return $client = Client::whereDeleted(0)->get();
	}
	public function getTechdata($id)
	{
		$Tech = Technologie::find($id);	
		return $Tech;
	}
	public function update($request,$id)
	{

		// $userData            = User::findOrFail(Auth::id());	
        $auctionerData            = Technologie::findOrFail($id);
            if ($auctionerData ) {                
         
			$Technologie = Technologie::find($id);// update
			$Technologie->technology = $request->name;
			$Technologie->save();
            if ($Technologie) {
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
		$auctionerData            = Technologie::findOrFail($id);
		if ($auctionerData ) {               
			$Technologie = Technologie::find($id);// update
			$Technologie->deleted = '1';
			$Technologie->save();
            if ($Technologie) {
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