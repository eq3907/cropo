<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodity';
    protected $primarykey = "id";
    public $timestamps = false;
    protected $fillable = [
        'file_path',
        'file_name'
    ];
}