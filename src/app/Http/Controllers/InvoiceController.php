<?php

namespace App\Http\Controllers;

use MonthlyReocrd;
use App\Models\Client;
use App\Monthly_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**key
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for ($i = -3; $i <= 0; $i++){
          $month_array_data[]= date('F-Y', strtotime("$i month"));
          $month_val[]=date('m-Y', strtotime("$i month"));
      }
      $month_data_all=[];
        $month_val= array_reverse($month_val);
        $month_array=[];
      $clients=DB::table('clients')->select('*')->where('deleted',0)->where('invoice_client',1)->get();
       $count=1;
       
    
          foreach($clients as $cl){
              
                $client=[];    
                 $status_count=0;            
                foreach($month_val as $month){                
                    
                     $start_date = date('Y-m-01', strtotime('01-'.$month));
                      $end_date  = date('Y-m-t', strtotime('01-'.$month));
                  
                     $data_count=DB::table('joinings')
                                    ->where('client_id',$cl->id)
                                    ->where('deleted',0)
                                    // ->orWhereBetween('start_date',[$start_date, $end_date])
                                    // ->orWhereBetween('end_date',[$start_date, $end_date])
                                    ->Where(function($query2) use ($start_date, $end_date){
                                        $query2->orWhereBetween('start_date',[$start_date, $end_date])
                                                ->orWhereBetween('end_date',[$start_date, $end_date])
                                                ->orWhere(function($query) use ($start_date, $end_date)
                                                    {
                                                        $query->where('start_date','<=', $start_date)->where('end_date','>=',$end_date);
                                                    });
                                    })
                                    ->count();              
                  
                    if($data_count >=1){
                        $status_count=1;
                    }
                     
                    $m=explode('-',$month);

                    if(!empty($data_count))
                    $client[$m[0]]['count']= $data_count;   
                    else
                    $client[$m[0]]['count']= '';   

                    $client[$m[0]]['client_id']=$cl->id;
                    $client[$m[0]]['clientdata']=$cl;
                    $client[$m[0]]['month']=$m[0];
                    $client[$m[0]]['year']=$m[1];
                    $client[$m[0]]['data'] = DB::table('monthly_records')   
                    ->select('*')   
                    ->where('month',$m[0])
                    ->where('year',$m[1])
                    ->where('client_id',$cl->id)
                    ->first();    
                    
                   
                }
                if($status_count==1)
                $month_array[$cl->client_name."+#+#".$cl->id."+#+#".$cl->invoice_client]=$client;
                  
      }
      $month_array_data= array_reverse($month_array_data);
      return view('invoiceView',compact('month_array','month_array_data','clients'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function updateStatus(Request $request){  
        // return $request;
        if($request->id !=null){
            Monthly_record::where('id',$request->id)->update(array($request->type=>$request->status));
            echo json_encode(array("success",'success'));
        }else{
            DB::insert('insert into monthly_records ('.$request->type.',month,year,client_id) values (?,?,?,?)', [$request->status,$request->month,$request->year,$request->client_id]);
            echo json_encode(array("success",'success'));
        }
    }

    function updateClientStatus(Request $request){  
        // return $request;
        if($request->client_id !=null){
            Client::where('id',$request->client_id)->update(array('invoice_client'=>$request->status));
            echo json_encode(array("success",'success'));            
        }
    }

}