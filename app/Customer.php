<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Filleble Exemple = Permite a inclusão dos campos especificos no banco de dados
    //protected $fillable = ['name', 'email', 'active'];

    // Guarded Exemple = Permite a inclusão de todos os campos no banco de dados
    protected $guarded = [];

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }
}
