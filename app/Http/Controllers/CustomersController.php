<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
     public function List() {
        // Mostra todos os cadastros ativos
        $activeCustomers = Customer::active()->get();
        // Mostra todos os cadastros inativos
        $inactiveCustomers = Customer::inactive()->get();

        $companies = Company::all();

        // Disponibiliza os resultados para que a View receba
        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));
     }

     // Salva os dados no banco
     public function store() {

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        // Cria um novo registro com os campos acima preenchidos
        Customer::create($data);

        return back();
     }
}
