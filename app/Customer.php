<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Filleble Exemple = Permite a inclusão dos campos especificos no banco de dados
    //protected $fillable = ['name', 'email', 'active'];

    // Guarded Exemple = Permite a inclusão de todos os campos no banco de dados
    protected $guarded = [];

    //Muda o valor do status para Ativo ou inativo
    public function getActiveAttribute($attribute)
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ][$attribute];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company()
    {
        //belongsTo significa que Customer pertence a (Company) Relação entre tabelas
        return $this->belongsTo(Company::class);

    }
}
