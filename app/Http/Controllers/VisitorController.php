<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getVisitor(Request $request)
    {
        $date = Carbon::now();
        $ipAddress = $this->getClientIPaddress($request);
        $checkVisitorToday = Visitor::where('ip',$ipAddress)->where('date',$date->toDateString())->first();
		if (!$checkVisitorToday) {
			Visitor::create([
				'ip'=>$ipAddress,
				'date'=>$date->toDateString(),
				'hits'=>1,
				'online'=>$date,
			]);
		}else{
			$checkVisitorToday->update([
				'hits'=>$checkVisitorToday->hits + 1,
				'online'=>$date,
			]);
		}
		$amountVisitorToday = Visitor::where('date',$date->toDateString())->groupBy('ip')->count();

		$amountVisitorThisMonth = Visitor::whereMonth('date',$date->month)->count();

		$amountVisitorThisYear = Visitor::whereYear('date',$date->year)->count();

		$totalVisitor = Visitor::count();

		$limitTime = $date->subMinutes(3);

		$onlineVisitor = Visitor::where('online','>',$limitTime)->count();

		$data = [
			'amountVisitorToday'=>$amountVisitorToday,
			'amountVisitorThisMonth'=>$amountVisitorThisMonth,
			'amountVisitorThisYear'=>$amountVisitorThisYear,
			'totalVisitor'=>$totalVisitor,
			'onlineVisitor'=>$onlineVisitor,
            'ip_address'=>$ipAddress
		];

		// dd($data);
		return response()->json($data, 200);
    }

    public function getClientIPaddress(Request $request) {

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $clientIp = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $clientIp = $forward;
        }
        else{
            $clientIp = $remote;
        }

        return $clientIp;
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
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
