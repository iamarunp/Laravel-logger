<?php

namespace laravelLogger\Errorreporter\Models;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    //
    protected $fillable=["type","request","headers","route","extras","exception"];
    protected $visible =['route','request','exception','headers','extras','created_at'];

    /*


    */
}
