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
    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);


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
      if ($response instanceof Response && $response->getStatusCode() > 399) {
        \DB::rollBack();

        $error_type="Exception";
    } else {
        \DB::commit();
        $error_type="Request";

    }
     if ( env('API_DATALOGGER', true) ) {
       $endTime = microtime(true);
       $filename = 'api_datalogger_rlogger.log';
       $dataToLog =["Time"=> gmdate("F j, Y, g:i a"),
                    "Duration" => number_format($endTime - LARAVEL_START, 3),
                    "Ip-address"=> $request->ip(),
                    "Url"=>$request->fullUrl(),
                    "method"=>$request->method(),
                    "input"=>$request->getContent(),
                    "headers"=>request()->header(),
                    "response"=>$response->getContent(),
                    "queries"=>$queries ,
                    "type"=>$error_type ];
        $data = LoggerRequests::create($dataToLog);

        $dataToLog = json_encode($dataToLog);

     \File::append( storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=", 20) . "\n\n");
      }

    //   if ( env('Exception_mail_alert', true) ) {

    //   Mail::send('contactform::emails.exception', ['exception' => $e, "request" => json_encode(request()->all(), JSON_PRETTY_PRINT), "header" => json_encode(request()->header(), JSON_PRETTY_PRINT)], function ($m) {

    //     $m->from('arun.p@cubettech.com', "no-reply");

    //     $m->to("arun.p@cubettech.com", 'User')->subject(url('/').'Exception !');
    // });

    // }





    return  $response;

     }

}
