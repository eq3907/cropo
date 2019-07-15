<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primarykey = "id";
    protected $fillable = [
        'company_name',
        'company_tel',
        'company_fax',
        'company_address',
        'company_tax_id_number',
        'company_brief'
    ];

    public function persons()
    {
        return $this->hasMany('App\Models\Contact_person', 'cid','id');
    }    

}
