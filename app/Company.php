<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // protege a entrada de dados
    protected $guarded = [];


    public function customers(){
        //Has Many significa que uma Company tem muitos (Customers) - Relação entre tabelas
        return $this->hasMany(Customer::class);

    }
}
