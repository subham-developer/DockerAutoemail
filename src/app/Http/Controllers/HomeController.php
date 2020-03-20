<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomeRepo;
use App\Repositories\ResouceRepo;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$HomeRepo = new HomeRepo();
        $counts = $HomeRepo->getcount();
        $onBenchResource = $HomeRepo->onBenchResource();
        $upcomingBenchResource = $HomeRepo->upcomingBenchResource();
        $notesList = $HomeRepo->notesList();

        $ResourceRepo = new ResouceRepo();
        $res = $ResourceRepo->gettechnology();

        // $user_login = \Session::get('user_login');    //Get user details

        $activeClientList = $counts['ActiveClientDTL'];
        for($i = 0; $i < sizeof($activeClientList); $i++){
			for($j = $i; $j > 0; $j--){
				if($activeClientList[$j]->resource > $activeClientList[($j-1)]->resource){
					$tempData = $activeClientList[$j];
					$activeClientList[$j] = $activeClientList[($j-1)];
					$activeClientList[($j-1)] = $tempData;
				}
			}
		}

        // dd($onBenchResource);   
    	// return view('index',['counts' => $counts, 'onBenchResource' => $onBenchResource, 'upcomingBenchResource' => $upcomingBenchResource, 'notesList' => $notesList]);
    	return view('dashboard',['counts' => $counts, 'onBenchResource' => $onBenchResource, 'upcomingBenchResource' => $upcomingBenchResource, 'notesList' => $notesList,'activeClientList' => $activeClientList, 'technology' => $res]);
    }

    function getIndActiveClient($id)
    {
    	$HomeRepo = new HomeRepo();
    	$IndActCli = $HomeRepo->getIndActiveClient($id);
    	return $IndActCli;
    }

    function resourceReport(Request $request){

        $HomeRepo = new HomeRepo();
        $onBenchResource = $HomeRepo->onBenchResourceFilter($request);
        $upcomingBenchResource = $HomeRepo->upcomingBenchResourceFilter($request);

        echo json_encode(['onBenchResource' => $onBenchResource , 'upcomingBenchResource' => $upcomingBenchResource]);
    }

}
