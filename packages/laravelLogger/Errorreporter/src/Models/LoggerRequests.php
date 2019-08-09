<?php

namespace laravelLogger\Errorreporter\Models;

use Illuminate\Database\Eloquent\Model;

class LoggerRequests extends Model
{
    //
    protected $table="loggers_requests";
    protected $fillable=["time","duration","ip","url","method","input","headers","response","queries"];
    protected $visible =["time","duration","ip","url","method","input","headers","response","queries"];

    /*


    */
}
