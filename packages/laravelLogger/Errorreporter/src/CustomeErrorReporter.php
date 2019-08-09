<?php

namespace laravelLogger\Errorreporter;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Application;
use laravelLogger\Errorreporter\Models\Logger;
use Mail;
class CustomeErrorReporter implements ExceptionHandler
{
    protected $parentHandler;


    public function __construct (Handler $handle)
    {
        # code...
        $this->parentHandler = $handle;

    }

    public function report(Exception $e)
    {      return  $this->parentHandler->report($e);

        $route = Route::getCurrentRoute();
        // Logger::create(['type' => 'exception'
        // ,'request' => json_encode(request()->all(), JSON_PRETTY_PRINT)
        // ,'headers' => json_encode(request()->header(), JSON_PRETTY_PRINT)
        // ,'exception' => json_encode(["message"=>$e->getMessage() ,"file"=> $e->getFile(),"line"=>$e->getLine(),"code"=> $e->getCode()])
        // ,'route' => "$route->uri"
        // ,'extras' =>$route->methods[0]]);

    }

    public function shouldReport(Exception $e)
    {
        return true;
    }

    public function render($request, Exception $e)
    {
        return $this->parentHandler->render($request, $e);
    }

    public function renderForConsole($output, Exception $e)
    {
        (new Application)->renderException($e, $output);
    }
}
