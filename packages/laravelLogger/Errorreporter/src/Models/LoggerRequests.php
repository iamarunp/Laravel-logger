<?php

namespace laravelLogger\Errorreporter\Models;

use Illuminate\Database\Eloquent\Model;

class LoggerRequests extends Model
{
    //
    protected $table="request_logger";
    protected $fillable=["time","path","duration","extras","ip","url","method","input","headers","response","queries","type"];
    protected $visible =["id","time","path","duration","extras","ip","url","method","input","headers","response","queries","type","created_at"];

    /*


    */
}
