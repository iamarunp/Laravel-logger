<?php

namespace laravelLogger\Errorreporter\Middleware;

use Closure;

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
    }
    public function terminate($request, $response)
    {

        $queries = \DB::getQueryLog();
     if ( env('API_DATALOGGER', true) ) {
       $endTime = microtime(true);
       $filename = 'api_datalogger_' . date('d-m-y') . '.log';
       $dataToLog  = 'Time: '   . gmdate("F j, Y, g:i a") . "\n*******\n";
       $dataToLog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n*******\n";
       $dataToLog .= 'IP Address: ' . $request->ip() . "\n*******\n";
       $dataToLog .= 'URL: '    . $request->fullUrl() . "\n*******\n";
       $dataToLog .= 'Method: ' . $request->method() . "\n*******\n";
       $dataToLog .= 'Input: '  . $request->getContent() . "\n*******\n";
       $dataToLog .= 'Output: ' . $response->getContent() . "\n*******\n";
       $dataToLog .= 'Querries: ' .json_encode($queries,JSON_PRETTY_PRINT) . "\n*******\n";
      \File::append( storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=", 20) . "\n\n");
      }

      if ($response instanceof Response && $response->getStatusCode() > 399) {
        \DB::rollBack();
    } else {
        \DB::commit();
    }

     }

}
