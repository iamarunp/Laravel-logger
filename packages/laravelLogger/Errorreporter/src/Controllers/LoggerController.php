<?php

namespace laravelLogger\Errorreporter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use laravelLogger\Errorreporter\Models\LoggerRequests;

class LoggerController extends Controller
{
    //
    public function index(Request $request)
    {

        $data = new LoggerRequests;
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
        switch (request('order')[0]['column']) {
            case "0":
                     $data=$data->orderBy('method',request('order')[0]['dir']);
                break;
            case "1":
                    $data=$data->orderBy('path',request('order')[0]['dir']);
                break;
            case "3":
                      $data=$data->orderBy('type',request('order')[0]['dir']);
                break;
            case "4":
                    $data=$data->orderBy('duration',request('order')[0]['dir']);
                break;
            case "5":
                    $data=$data->orderBy('created_at',request('order')[0]['dir']);
                break;

            default:
            $data=$data->orderBy('id','DESC');
        }
        $data=$data->get();
        $data_total_count = LoggerRequests::count();
        $data_count=count($data);
        $result = ['data' =>$data,
        'draw' => (int)request('draw'),
        'recordsFiltered'=> $data_total_count,
        'recordsTotal'=> $data_total_count];
        return $result;


    }

    public function requestLogs(Request $request)
    {

        try
        {
            $filename = 'api_datalogger_rlogger.log';

            $contents = \File::get( storage_path('logs' . DIRECTORY_SEPARATOR . $filename));
            if($contents)
            {
                $contents = explode('====================',trim($contents));
                foreach ($contents as $key => &$value) {
                    # code...
                    $value = json_decode($value);
                }
            }
            return $contents;
        }
        catch (Illuminate\Contracts\Filesystem\FileNotFoundException $exception)
        {
            die("The file doesn't exist");
        }

    }

    public function cabinet(Request $request,$xx=null)
    {

        if($xx !=null && in_array($xx, ["d1","d2","d3","d4","d6","d7","d5"]))
        {
            return json_encode(['status'=>true,"data"=>["open"=>1],"xx"=>$xx]);
        }
        session_start();

        # code...
                    if(isset($_SESSION['open']))
            {
            $open=1;
            unset($_SESSION['open']);
            }
            else
            {
            $_SESSION['open']=1;
            $open=0;
            }
            echo json_encode(['status'=>true,"data"=>["open"=>$open],"xx"=>$xx]);
    }
}
