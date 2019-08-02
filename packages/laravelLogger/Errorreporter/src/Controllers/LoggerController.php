<?php

namespace laravelLogger\Errorreporter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use laravelLogger\Errorreporter\Models\Logger;

class LoggerController extends Controller
{
    //
    public function index(Request $request)
    {

        $data = Logger::where('type','exception');
        if(request('length'))
        {
            $take=request('length');
            $data=$data->take($take);
        }
        if(request('start'))
        {
            $skip=request('start');
            $data=$data->skip($skip);
        }
        $data=$data->orderBy('id','DESC')->get();
        $data_total_count = Logger::where('type','exception')->count();
        $data_count=count($data);
        $result = ['data' =>$data,
        'draw' => $data_count,
        'recordsFiltered'=> $data_total_count,
        'recordsTotal'=> $data_total_count];
        return $result;


    }
}
