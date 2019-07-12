<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //Lista todos os Customers
     public function index()
     {
        //Lista os Customers ativos e inativos
        $customers = Customer::all();

        // Disponibiliza os resultados para que a View receba
        return view('customers.index', compact('customers'));
    }

    //chama o formulário de cadastro
    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
     }


     // Salva os dados preenchidos no create e direciona para a lista de Customers
     public function store() {

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        // Cria um novo registro com os campos acima preenchidos
        Customer::create($data);
        //redireciona para a lista
        return redirect('customers');
     }

     // Exibe o detalhe de cada cadastro
     public function show(Customer $customer)
     {
        return view('customers.show', compact('customer'));
     }
}
