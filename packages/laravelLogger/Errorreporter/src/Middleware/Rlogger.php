<?php

namespace laravelLogger\Errorreporter\Middleware;

use Closure;
use laravelLogger\Errorreporter\Models\LoggerRequests;
use Mail;

class Rlogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $startTime;
    public $errors;
    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);

        // app()->instance('rstart_time',  $this->startTime);

        \DB::enableQueryLog();


        \DB::beginTransaction();

        try {
            $response = $next($request);
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
        return $next($request);

    }
    public function terminate($request, $response)
    {


        $queries = \DB::getQueryLog();
      if ($response->getStatusCode() >= 399) {
        \DB::rollBack();
        $error_type="Exception";

        $response = $this->errors->getMessage();
        $extras =$this->errors;
    } else {
        \DB::commit();
        $error_type="Request";

        $response= (strlen(($response->getContent()))>65535)?"Truncated Due to size":($response->getContent());
        $extras =$response;

    }


     if ( env('API_DATALOGGER', true) ) {
       $endTime = microtime(true);
       $filename = 'api_datalogger_rlogger.log';
       $dataToLog =["time"=> gmdate("F j, Y, g:i a"),
                    "duration" => number_format($endTime - LARAVEL_START, 3),
                    "ip"=> $request->ip(),
                    "path"=>($request->getPathInfo()),
                    "url"=>($request->fullUrl()),
                    "method"=>($request->method()),
                    "input"=>json_encode($request->all()),
                    "headers"=>json_encode(request()->header()),
                    "extras"=>$extras,
                    "response"=>$response,
                    "queries"=>json_encode($queries) ,
                    "type"=>($error_type )];
        $data = LoggerRequests::create($dataToLog);
        $dataToLog = json_encode($dataToLog);

     \File::append( storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog. "\n" . str_repeat("=", 20) . "\n\n");
      }





     }


}
