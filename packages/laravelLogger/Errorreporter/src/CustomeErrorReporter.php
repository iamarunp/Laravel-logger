<?php

namespace laravelLogger\Errorreporter;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Application;

class CustomeErrorReporter implements ExceptionHandler
{
    protected $parentHandler;


    public function __construct (Handler $handle)
    {
        # code...
        $this->parentHandler = $handle;

    }

    public function report(Exception $e)
    {
        $this->parentHandler->report($e);
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
