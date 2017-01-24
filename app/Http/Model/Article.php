<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="article";
    protected $primaryKey="art_id";
    public $timestamps=false;
    protected $guarded=[]; //不允許填入的項目
}
