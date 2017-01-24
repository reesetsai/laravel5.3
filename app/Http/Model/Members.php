<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table="members";
    protected $primaryKey="id";
    public $timestamps=false;
}
