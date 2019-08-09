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
