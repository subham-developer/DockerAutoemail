<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Interview;
use App\Models\Client;
use App\Models\Resource;
use App\Models\Joining;
use App\Models\Setting;
use App\Models\Technologie;
use Session;
use DB;
use App\Helper\CommonHelper;
use App\Repositories\Note;

class HomeRepo 
{
	public function getcount()
	{
		$arr = [];
		$totalResource =  Resource::whereDeleted(0)->count();


		$InHouseResource =  Resource::leftjoin('joinings', 'resources.id', '=', 'joinings.resource_id')
		->where([['resources.deleted', '=', 0]])->whereNull('joinings.resource_id')->count();


    	$ClientSideResource =  Resource::join('joinings', 'resources.id', '=', 'joinings.resource_id')
		->where([
    	['resources.deleted', '=', 0]])->count(DB::raw('DISTINCT resources.id'));

    	$totalClient =  Client::whereDeleted(0)->count();
        
    	// $ActiveClient =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')
    	// ->where([
    	// ['joinings.deleted', '=', 0]])->groupBy('clients.id')->count(DB::raw('DISTINCT clients.id'));

        $ActiveClient =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')
        ->where([
        ['joinings.deleted', '=', 0]])->count(DB::raw('DISTINCT clients.id'));

    	/*$ActiveClientDTL =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')
    	->distinct()
    	->where([
    	['joinings.deleted', '=', 0]])
    	->select('clients.client_name', 'clients.id','clients.address','clients.reporting_name','clients.reporting_email')
		->get('clients.id');*/
		
		$start_date = date('Y-m-01'); // hard-coded '01' for first day
		$end_date  = date('Y-m-t');
		$ActiveClientDTL =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')
									->join('resources', 'joinings.resource_id', '=', 'resources.id')
									// ->where([
									// 	['joinings.deleted', '=', 0]])
									->Where(function($query2) use ($start_date, $end_date){
                                        $query2->orWhereBetween('joinings.start_date',[$start_date, $end_date])
                                                ->orWhereBetween('joinings.end_date',[$start_date, $end_date])
                                                ->orWhere(function($query) use ($start_date, $end_date)
                                                    {
                                                        $query->where('joinings.start_date','<=', $start_date)->where('joinings.end_date','>=',$end_date);
                                                    });
                                    })
									->select('client_id','client_name','reporting_name','reporting_email','address',DB::raw('count(client_id) as resource'))->groupBy('client_id')->get();


		$dt =  date('Y-m-d',strtotime('+30 days',strtotime(date('Y-m-d')))) . PHP_EOL;

    	$NxtMonRelease = Resource::join('joinings', 'resources.id', '=', 'joinings.resource_id')
    	->where([['joinings.deleted', '=', 0],['resources.deleted', '=', 0],['joinings.end_date', '<=', $dt]])
    	->select('resources.fname', 'resources.lname','resources.phone','resources.email','resources.language','joinings.end_date')
    	->get();

    	$lang=[];
    	$languages =  Technologie::whereDeleted(0)->get();
    	foreach ($languages as $key => $values) {
    		$lang[$key]['id']=$values['id'];
    		$lang[$key]['lang']=$values['technology'];
    	}
    	
    	$rel=[];
    	foreach ($NxtMonRelease as $key => $value) {
    		$rel[$key]['name']		=$value['fname'].' '.$value['lname'];
    		$rel[$key]['phone']		=$value['phone'];
    		$rel[$key]['email']		=$value['email'];
    		$rel[$key]['end_date']	=$value['end_date'];
    		$langid = explode(',', $value['language']);  

    		$technology="";
    		for($i=0;$i<count($lang);$i++)
    		{    			
    			for($j=0;$j<count($langid);$j++)
    			{  
    				if($lang[$i]['id'] == $langid[$j])
    				{    					
    					$technology .= $lang[$i]['lang'].',';
    				}
    			}
    		}
    		$tech = rtrim($technology, ',');
    		$rel[$key]['technology']	= $tech;
    	}



    	$OnBeanchResource =  Resource::leftjoin('joinings', 'resources.id', '=', 'joinings.resource_id')
		->where([['resources.deleted', '=', 0]])->whereNull('joinings.resource_id')
		->select('resources.fname', 'resources.lname','resources.phone','resources.email','resources.language')
    	->get();
    	$rel1=[];
    	foreach ($OnBeanchResource as $key => $value) {
    		$rel1[$key]['name']		=$value['fname'].' '.$value['lname'];
    		$rel1[$key]['phone']	=$value['phone'];
    		$rel1[$key]['email']	=$value['email'];
    		$langid1 = explode(',', $value['language']);  

    		$technology1="";
    		for($i=0;$i<count($lang);$i++)
    		{    			
    			for($j=0;$j<count($langid1);$j++)
    			{  
    				if($lang[$i]['id'] == $langid1[$j])
    				{    					
    					$technology1 .= $lang[$i]['lang'].',';
    				}
    			}
    		}
    		$tech1 = rtrim($technology1, ',');
    		$rel1[$key]['technology']	= $tech1;
    	}


   
		$arr['totalResource'] 		= $totalResource;
		$arr['InHouseResource'] 	= $InHouseResource;
		$arr['ClientSideResource'] 	= $ClientSideResource;
		$arr['totalClient'] 		= $totalClient;
		$arr['ActiveClient'] 		= $ActiveClient;
		$arr['ActiveClientDTL'] 	= $ActiveClientDTL;
		$arr['NxtMonthRel'] 		= $rel;
		$arr['OnBeanchResource'] 	= $rel1;

		return $arr;
	}

    function getIndActiveClient1($id)
    {
        $ActiveClientDTL =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')
        ->distinct()
        ->where([
        ['joinings.deleted', '=', 0],['clients.id','=',$id]])
        ->select('clients.client_name', 'clients.id','clients.address','clients.reporting_name','clients.reporting_email')
        ->get('clients.id');
        return $ActiveClientDTL;
    }

    function getIndActiveClient($id)
    {
        /*$ActiveClientDTL =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')->join('resources', 'joinings.resource_id', '=', 'resources.id')->select('client_name', DB::raw('count(clients.id) as sum'))->groupBy('clients.id')->get();*/
        $ActiveClientDTL =  Client::join('joinings', 'clients.id', '=', 'joinings.client_id')->join('resources', 'joinings.resource_id', '=', 'resources.id')->where([
        ['clients.id','=',$id]])->select('client_id','client_name','reporting_name','reporting_email','address',DB::raw('count(client_id) as resource'))->groupBy('client_id')->get();
        /*$ActiveClientDTL = DB::select(DB::raw("SELECT b.id,client_name,reporting_name,reporting_email,address,COUNT(c.id) AS resource FROM joinings a INNER JOIN clients b ON a.client_id = b.id INNER JOIN resources c ON a.resource_id = c.id GROUP BY a.client_id"));*//*
        $ActiveClientDTL = DB::table('clients as a')->join('joinings as b','a.id','=','b.client_id')->join('resources as c','c.id','=','b.resource_id')->select('client_id')->get()->groupBy('client_id');*/
        return $ActiveClientDTL;


	}
	
	function onBenchResource(){
		$CommonHelper = new CommonHelper;

		$data = Resource::select('resources.fname','resources.lname','resources.resident_address','resources.exp_date','resources.language','resources.otherlanguage','resources.email','resources.phone','resources.resume','resources.resume_type',DB::raw("group_concat(joinings.end_date separator ',') as end_date"),DB::raw("group_concat(nonjoinings.end_date separator ',') as nonjoiningEndDate"),DB::raw("group_concat(joinings.deleted separator ',') as deleted"),'resources.created_at')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('nonjoinings','nonjoinings.joining_id','=','joinings.id')
						->where('resources.on_bench',1)
						->where('resources.deleted',0)
						->groupBy('resources.id')
						->orderBy('joinings.id','DESC')
						->get();
		$arrayList = array();
		$techList = array();
		
		$i = 0;
		foreach($data as $key => $value){
			$arrayList[$i]['name'] = $value->fname.' '.$value->lname;
			$arrayList[$i]['resident_address'] = $value->resident_address;
			
			if($value->exp_date != "0000-00-00"){
				$date1 = new \DateTime(date('Y-m-d'));
				$date2 = new \DateTime($value->exp_date);
				$diff = $date1->diff($date2);
				$arrayList[$i]['exp_date'] = ($diff->format('%y')).' Year & '.$diff->format('%m').' Months'; 
			}
			else{
				$arrayList[$i]['exp_date'] = 'NA';
			}

			$arrayList[$i]['tech'] = explode(',',$value->language);
			$techList = array_merge(explode(',',$value->language), $techList);
			$arrayList[$i]['otherlanguage'] = $value->otherlanguage;
			$arrayList[$i]['email'] = $value->email;
			$arrayList[$i]['phone'] = $value->phone;
			$arrayList[$i]['resume'] = $value->resume;
			$arrayList[$i]['resume_type'] = $value->resume_type;
			$arrayList[$i]['deleted'] = $value->deleted;

			if (strpos($arrayList[$i]['resume'], 'https://drive.google.com') !== false OR strpos($arrayList[$i]['resume'], 'https://docs.google.com') !== false)
			{
				$arrayList[$i]['resume'] =  $arrayList[$i]['resume'];
			}
			else
			{
				$arrayList[$i]['resume'] = url('/').$arrayList[$i]['resume'];
			}
			
			$arrayList[$i]['end_date'] = $value->end_date;
			$arrayList[$i]['nonjoiningEndDate'] = $value->nonjoiningEndDate;

			//Get resource idle data
			if($value->nonjoiningEndDate != ""){
				$date = explode(',',$value->nonjoiningEndDate);
				$tempDate = array();
				foreach($date as $value2){
					$tempDate[] = strtotime($value2);
				}
				sort($tempDate);

				if(end($tempDate) <= strtotime(date('Y-m-d'))){
					$now = time(); // or your date as well
					$your_date = strtotime($value2);
					$datediff = $now - $your_date;

					$arrayList[$i]['idleDays'] = $datediff;
				}
			}
			else{
				// $arrayList[$i]['idleDays'] = $value['created_at'];
				$now = time(); // or your date as well
				$your_date = strtotime($value->created_at);
				$datediff = $now - $your_date;

				$arrayList[$i]['idleDays'] = (int)round($datediff / (60 * 60 * 24)).' days';
			}

			if(($value->delete == "" || !in_array(0,explode(',',$value->deleted))) && isset($arrayList[$i]['idleDays'])){

				if($value->nonjoiningEndDate != "" && $value->nonjoiningEndDate != null && strtotime(end(explode(',',$value->nonjoiningEndDate))) < strtotime(date('Y-m-d')) ){
					$i++;
				}
				else if(($value->nonjoiningEndDate == "" || $value->nonjoiningEndDate == null) && ($value->end_date == "" || strtotime(end(explode(',',$value->end_date))) < strtotime(date('Y-m-d')))){
					$i++;
				}
				else{
					unset($arrayList[$i]);	
				}
			}
			else{
				unset($arrayList[$i]);
			}
		}
		

		// dd($arrayList);
		if(empty($arrayList)){
			return $arrayList;
		}

		//Multi array sorting as per max idle days
		for($i = 0; $i < sizeof($arrayList); $i++){
			for($j = $i; $j > 0; $j--){
				if($arrayList[$j]['idleDays'] > $arrayList[($j-1)]['idleDays']){
					$tempData = $arrayList[$j];
					$arrayList[$j] = $arrayList[($j-1)];
					$arrayList[($j-1)] = $tempData;
				}
			}
		}

		$data = Technologie::select('technology','id')
							->whereIn('id', $techList)
							->get();
		foreach($arrayList as $key => $value){
			foreach($data as $value1){
				if(in_array($value1->id, $value['tech'])){
					$arrayList[$key]['techname'][] = $value1->technology;
				}
			}
			unset($arrayList[$key]['tech']);
		}
		
		return $arrayList;
	}

	function upcomingBenchResource(){
		$CommonHelper = new CommonHelper;

		$data = Resource::select('resources.fname','resources.lname','resources.resident_address','resources.exp_date','resources.language','resources.otherlanguage','resources.email','resources.phone','resources.resume','resources.resume_type','clients.client_name','joinings.end_date','nonjoinings.end_date as nonJoiningEndDate')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('clients','clients.id','=','joinings.client_id')
						->leftJoin('nonjoinings','nonjoinings.joining_id','=','joinings.id')
						// ->where('resources.on_bench',0)
						->where('resources.deleted',0)
						->Where(function($query2){
							$query2->orWhereBetween('joinings.end_date', [date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))])
							->orWhereBetween('nonjoinings.end_date', [date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))]);
						})
						->get();
		$arrayList = array();
		$techList = array();

		$i = 0;
		// dd($data);
		foreach($data as $key => $value){
			$arrayList[$i]['name'] = $value['fname'].' '.$value['lname'];
			$arrayList[$i]['resident_address'] = $value['resident_address'];
			$arrayList[$i]['client_name'] = $value['client_name'];
			
			if($value['exp_date'] != "0000-00-00"){
				$date1 = new \DateTime(date('Y-m-d'));
				$date2 = new \DateTime($value['exp_date']);
				$diff = $date1->diff($date2);
				$arrayList[$i]['exp_date'] = ($diff->format('%y')).' Year & '.$diff->format('%m').' Months'; 
			}
			else{
				$arrayList[$i]['exp_date'] = 'NA';
			}

			$arrayList[$i]['tech'] = explode(',',$value['language']);
			$techList = array_merge(explode(',',$value['language']), $techList);
			$arrayList[$i]['otherlanguage'] = $value['otherlanguage'];
			$arrayList[$i]['email'] = $value['email'];
			$arrayList[$i]['phone'] = $value['phone'];
			$arrayList[$i]['resume'] = $value['resume'];
			$arrayList[$i]['resume_type'] = $value['resume_type'];

			if(($value['nonJoiningEndDate'] == "" || $value['nonJoiningEndDate'] == null ) && $value['end_date'] != "" && $value['end_date'] != null && $value['end_date'] >= date('Y-m-d') && $value['end_date'] <= date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))){
				// $datetime1 = date_create(date('Y-m-d'));
				// $datetime2 = date_create($value['end_date']);
				// $interval = date_diff($datetime1, $datetime2);
				// $arrayList[$i]['endDate'] = $interval->format('%d Days Left');
				$arrayList[$i]['endDate'] = $CommonHelper->convertDateFomate($value['end_date']);
				$i++;
			}
			else if($value['nonJoiningEndDate'] != "" && strtotime(date('Y-m-d')) <= strtotime($value['nonJoiningEndDate']) && $value['end_date'] >= date('Y-m-d') && strtotime($value['nonJoiningEndDate']) <= strtotime(date('Y-m-d'). ' + 30 days')){
				$arrayList[$i]['endDate'] = $CommonHelper->convertDateFomate($value['nonJoiningEndDate']);
				$i++;
			}
			else{
				unset($arrayList[$i]);
			}
		}

		if(empty($arrayList)){
			return $arrayList;
		}

		$data = Technologie::select('technology','id')
							->whereIn('id', $techList)
							->get();
		foreach($arrayList as $key => $value){
			foreach($data as $value1){
				if(in_array($value1->id, $value['tech'])){
					$arrayList[$key]['techname'][] = $value1->technology;
				}
			}
			unset($arrayList[$key]['tech']);
		}

		return $arrayList;
	}

	function notesList(){
		$noteList = Note::where('delete',0)->where('user_id',$this->getUserLoginId())->get();
		$CommonHelper = new CommonHelper;

		foreach($noteList as $key => $value){
			$noteList[$key]->adddate = $CommonHelper->convertDateFomate($value->updated_at);
		}

		return $noteList;
	}

	function getUserLoginId(){
        $email = \Session::get('user_login');

        $data = \DB::table('users')->where('email',$email)->get();
        return $data[0]->id;
	}
	
	function onBenchResourceFilter($request){
		$CommonHelper = new CommonHelper;

		$data = Resource::select('resources.fname','resources.lname','resources.resident_address','resources.exp_date','resources.language','resources.otherlanguage','resources.email','resources.phone','resources.resume','resources.resume_type',DB::raw("group_concat(joinings.end_date separator ',') as end_date"),DB::raw("group_concat(nonjoinings.end_date separator ',') as nonjoiningEndDate"),DB::raw("group_concat(joinings.deleted separator ',') as deleted"),'resources.created_at')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('nonjoinings','nonjoinings.joining_id','=','joinings.id')
						->where('resources.on_bench',1)
						->where('resources.deleted',0);

		//Location filter
		if(isset($request->location) && $request->location != ""){
			$data = $data->where('resources.resident_address', 'like', '%'.$request->location.'%');
		}


		$data = $data->groupBy('resources.id')
				->orderBy('joinings.id','DESC')
				->get();
				
		$arrayList = array();
		$techList = array();
		
		$i = 0;
		foreach($data as $key => $value){
			$arrayList[$i]['name'] = $value->fname.' '.$value->lname;
			$arrayList[$i]['resident_address'] = $value->resident_address;
			
			if($value->exp_date != "0000-00-00"){
				$date1 = new \DateTime(date('Y-m-d'));
				$date2 = new \DateTime($value->exp_date);
				$diff = $date1->diff($date2);
				$arrayList[$i]['exp_date'] = ($diff->format('%y')).' Year & '.$diff->format('%m').' Months'; 
			}
			else{
				$arrayList[$i]['exp_date'] = 'NA';
			}

			$arrayList[$i]['tech'] = explode(',',$value->language);
			$techList = array_merge(explode(',',$value->language), $techList);
			$arrayList[$i]['otherlanguage'] = $value->otherlanguage;
			$arrayList[$i]['email'] = $value->email;
			$arrayList[$i]['phone'] = $value->phone;
			$arrayList[$i]['resume'] = $value->resume;
			$arrayList[$i]['resume_type'] = $value->resume_type;
			$arrayList[$i]['deleted'] = $value->deleted;

			if (strpos($arrayList[$i]['resume'], 'https://drive.google.com') !== false OR strpos($arrayList[$i]['resume'], 'https://docs.google.com') !== false)
			{
				$arrayList[$i]['resume'] =  $arrayList[$i]['resume'];
			}
			else
			{
				$arrayList[$i]['resume'] = url('/').$arrayList[$i]['resume'];
			}
			
			$arrayList[$i]['end_date'] = $value->end_date;
			$arrayList[$i]['nonjoiningEndDate'] = $value->nonjoiningEndDate;

			//Get resource idle data
			if($value->nonjoiningEndDate != ""){
				$date = explode(',',$value->nonjoiningEndDate);
				$tempDate = array();
				foreach($date as $value2){
					$tempDate[] = strtotime($value2);
				}
				sort($tempDate);

				if(end($tempDate) <= strtotime(date('Y-m-d'))){
					$now = time(); // or your date as well
					$your_date = strtotime($value2);
					$datediff = $now - $your_date;

					$arrayList[$i]['idleDays'] = $datediff;
				}
			}
			else{
				// $arrayList[$i]['idleDays'] = $value['created_at'];
				$now = time(); // or your date as well
				$your_date = strtotime($value->created_at);
				$datediff = $now - $your_date;

				$arrayList[$i]['idleDays'] = (int)round($datediff / (60 * 60 * 24)).' days';
			}

			if(($value->delete == "" || !in_array(0,explode(',',$value->deleted))) && isset($arrayList[$i]['idleDays'])){

				if($value->nonjoiningEndDate != "" && $value->nonjoiningEndDate != null && strtotime(end(explode(',',$value->nonjoiningEndDate))) < strtotime(date('Y-m-d')) ){
					$i++;
				}
				else if(($value->nonjoiningEndDate == "" || $value->nonjoiningEndDate == null) && ($value->end_date == "" || strtotime(end(explode(',',$value->end_date))) < strtotime(date('Y-m-d')))){
					$i++;
				}
				else{
					unset($arrayList[$i]);	
				}

				//Experience Validation
				if(isset($request->experience) && !empty($request->experience)){
					$validationCount = 0;
					foreach($request->experience as $tempValidaiton){
						if($tempValidaiton == "0-1" && (strpos($arrayList[($i-1)]['exp_date'], '0 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "1-2" && (strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false || strpos( $arrayList[($i-1)]['exp_date'], '2 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "2-3" && (strpos($arrayList[($i-1)]['exp_date'], '2 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '3 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "3+" && strpos($arrayList[($i-1)]['exp_date'], '0 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '1 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '2 Year') === false){
							$validationCount++;
						}
					}

					if($validationCount == 0){
						$i--;
						unset($arrayList[$i]);
					}
				}

			}
			else{
				unset($arrayList[$i]);
			}
		}
		

		// dd($arrayList);
		if(empty($arrayList)){
			return $arrayList;
		}

		//Multi array sorting as per max idle days
		for($i = 0; $i < sizeof($arrayList); $i++){
			for($j = $i; $j > 0; $j--){
				if($arrayList[$j]['idleDays'] > $arrayList[($j-1)]['idleDays']){
					$tempData = $arrayList[$j];
					$arrayList[$j] = $arrayList[($j-1)];
					$arrayList[($j-1)] = $tempData;
				}
			}
		}

		//Filter technical - Start
		if(isset($request->technology) && !empty($request->technology)){
			$tempData = array();
			foreach($techList as $value){
				foreach($request->technology as $value2){
					if($value == $value2){
						$tempData[] = $value;
					}
				}
			}
			$techList = $tempData;
		}
		
		if(empty($techList)){
			return array();
		}
		$techList = array_unique($techList);
		//Filter technical - End


		$data = Technologie::select('technology','id')
							->whereIn('id', $techList)
							->get();
		$i = 0;
		foreach($arrayList as $key => $value){
			foreach($data as $value1){
				if(in_array($value1->id, $value['tech'])){
					$arrayList[$key]['techname'][] = $value1->technology;
				}
			}

			if(!isset($arrayList[$key]['techname'])){
				unset($arrayList[$key]);
			}
			else{
				$arrayList[$key]['techname'] = implode(',',$arrayList[$key]['techname']);
				unset($arrayList[$key]['tech']);
			}
		}
		
		return array_values($arrayList);
	}

	function upcomingBenchResourceFilter($request){
		$CommonHelper = new CommonHelper;

		$data = Resource::select('resources.fname','resources.lname','resources.resident_address','resources.exp_date','resources.language','resources.otherlanguage','resources.email','resources.phone','resources.resume','resources.resume_type','clients.client_name','joinings.end_date','nonjoinings.end_date as nonJoiningEndDate')
						->leftJoin('joinings','joinings.resource_id','=','resources.id')
						->leftJoin('clients','clients.id','=','joinings.client_id')
						->leftJoin('nonjoinings','nonjoinings.joining_id','=','joinings.id')
						// ->where('resources.on_bench',0)
						->where('resources.deleted',0);
		
		//Location filter
		if(isset($request->location) && $request->location != ""){
			$data = $data->where('resources.resident_address', 'like', '%'.$request->location.'%');
		}
		$data = $data->Where(function($query2){
							$query2->orWhereBetween('joinings.end_date', [date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))])
							->orWhereBetween('nonjoinings.end_date', [date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))]);
						})
						->get();

		$arrayList = array();
		$techList = array();

		$i = 0;
		// dd($data);
		foreach($data as $key => $value){
			$arrayList[$i]['name'] = $value['fname'].' '.$value['lname'];
			$arrayList[$i]['resident_address'] = $value['resident_address'];
			$arrayList[$i]['client_name'] = $value['client_name'];
			
			if($value['exp_date'] != "0000-00-00"){
				$date1 = new \DateTime(date('Y-m-d'));
				$date2 = new \DateTime($value['exp_date']);
				$diff = $date1->diff($date2);
				$arrayList[$i]['exp_date'] = ($diff->format('%y')).' Year & '.$diff->format('%m').' Months'; 
			}
			else{
				$arrayList[$i]['exp_date'] = 'NA';
			}

			$arrayList[$i]['tech'] = explode(',',$value['language']);
			$techList = array_merge(explode(',',$value['language']), $techList);
			$arrayList[$i]['otherlanguage'] = $value['otherlanguage'];
			$arrayList[$i]['email'] = $value['email'];
			$arrayList[$i]['phone'] = $value['phone'];
			$arrayList[$i]['resume'] = $value['resume'];
			$arrayList[$i]['resume_type'] = $value['resume_type'];

			if (strpos($arrayList[$i]['resume'], 'https://drive.google.com') !== false OR strpos($arrayList[$i]['resume'], 'https://docs.google.com') !== false)
			{
				$arrayList[$i]['resume'] =  $arrayList[$i]['resume'];
			}
			else
			{
				$arrayList[$i]['resume'] = url('/').$arrayList[$i]['resume'];
			}
			


			if(($value['nonJoiningEndDate'] == "" || $value['nonJoiningEndDate'] == null ) && $value['end_date'] != "" && $value['end_date'] != null && $value['end_date'] >= date('Y-m-d') && $value['end_date'] <= date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days'))){
				// $datetime1 = date_create(date('Y-m-d'));
				// $datetime2 = date_create($value['end_date']);
				// $interval = date_diff($datetime1, $datetime2);
				// $arrayList[$i]['endDate'] = $interval->format('%d Days Left');
				$arrayList[$i]['endDate'] = $CommonHelper->convertDateFomate($value['end_date']);
				$i++;

				//Experience Validation
				if(isset($request->experience) && !empty($request->experience)){
					$validationCount = 0;
					foreach($request->experience as $tempValidaiton){
						if($tempValidaiton == "0-1" && (strpos($arrayList[($i-1)]['exp_date'], '0 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "1-2" && (strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false || strpos( $arrayList[($i-1)]['exp_date'], '2 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "2-3" && (strpos($arrayList[($i-1)]['exp_date'], '2 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '3 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "3+" && strpos($arrayList[($i-1)]['exp_date'], '0 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '1 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '2 Year') === false){
							$validationCount++;
						}
					}

					if($validationCount == 0){
						$i--;
						unset($arrayList[$i]);
					}
				}
			}
			else if($value['nonJoiningEndDate'] != "" && strtotime(date('Y-m-d')) <= strtotime($value['nonJoiningEndDate']) && $value['end_date'] >= date('Y-m-d') && strtotime($value['nonJoiningEndDate']) <= strtotime(date('Y-m-d'). ' + 30 days')){
				$arrayList[$i]['endDate'] = $CommonHelper->convertDateFomate($value['nonJoiningEndDate']);
				$i++;

				//Experience Validation
				if(isset($request->experience) && !empty($request->experience)){
					$validationCount = 0;
					foreach($request->experience as $tempValidaiton){
						if($tempValidaiton == "0-1" && (strpos($arrayList[($i-1)]['exp_date'], '0 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "1-2" && (strpos($arrayList[($i-1)]['exp_date'], '1 Year') !== false || strpos( $arrayList[($i-1)]['exp_date'], '2 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "2-3" && (strpos($arrayList[($i-1)]['exp_date'], '2 Year') !== false || strpos($arrayList[($i-1)]['exp_date'], '3 Year') !== false)){
							$validationCount++;
						}
						
						if($tempValidaiton == "3+" && strpos($arrayList[($i-1)]['exp_date'], '0 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '1 Year') === false && strpos($arrayList[($i-1)]['exp_date'], '2 Year') === false){
							$validationCount++;
						}
					}

					if($validationCount == 0){
						$i--;
						unset($arrayList[$i]);
					}
				}
			}
			else{
				unset($arrayList[$i]);
			}
		}

		if(empty($arrayList)){
			return $arrayList;
		}

		//Filter technical - Start
		if(isset($request->technology) && !empty($request->technology)){
			$tempData = array();
			foreach($techList as $value){
				foreach($request->technology as $value2){
					if($value == $value2){
						$tempData[] = $value;
					}
				}
			}
			$techList = $tempData;
		}
		
		if(empty($techList)){
			return array();
		}
		$techList = array_unique($techList);
		//Filter technical - End

		$data = Technologie::select('technology','id')
							->whereIn('id', $techList)
							->get();
		foreach($arrayList as $key => $value){
			foreach($data as $value1){
				if(in_array($value1->id, $value['tech'])){
					$arrayList[$key]['techname'][] = $value1->technology;
				}
			}

			if(!isset($arrayList[$key]['techname'])){
				unset($arrayList[$key]);
			}
			else{
				$arrayList[$key]['techname'] = implode(',',$arrayList[$key]['techname']);
				unset($arrayList[$key]['tech']);
			}
		}

		return array_values($arrayList);
	}
}