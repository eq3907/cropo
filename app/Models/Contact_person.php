<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact_person extends Model
{
    protected $table = 'contact_person';
    protected $primarykey = "id";
    protected $fillable = [
        'name',
        'tel',
        'mail',
        'brief',
        'headshot'
    ];

    public function companys()
    {
        return $this->belongsTo('App\Models\Company','cid','id');
    }    

}