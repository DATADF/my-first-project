<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
     public function List() {
        // Mostra todos os cadastros ativos
        $activeCustomers = Customer::active()->get();
        // Mostra todos os cadastros inativos
        $inactiveCustomers = Customer::inactive()->get();

        // Exibe na view os resultados
        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
     }

     // Salva os dados no banco
     public function store() {

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required'
        ]);

        // Cria um novo registro com os campos acima preenchidos
        Customer::create($data);

        return back();
     }
}
