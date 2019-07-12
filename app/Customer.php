<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Filleble Exemple = Permite a inclusão dos campos especificos no banco de dados
    //protected $fillable = ['name', 'email', 'active'];

    // Guarded Exemple = Permite a inclusão de todos os campos no banco de dados
    protected $guarded = [];

    //Estabelece active como default
    protected $attributes = [
        'active' => 1
    ];

    //Muda o valor do status para Ativo ou inativo
    public function getActiveAttribute($attribute)
    {
        // chama a função que estabelece que o valor numérico será impresso como string
        return $this->activeOptions()[$attribute];
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

    // Estabelece que o valor numérico será impresso como string
    public function activeOptions()
    {
        // 0 e 1 são $activeOptionKey / Active e Inactive são $activeOptionValue
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress',
        ];
    }
}
