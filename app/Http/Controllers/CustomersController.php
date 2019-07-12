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
        //Pega todas as Companies e transforma em variável
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
     }


     // Salva os dados preenchidos no create e direciona para a lista de Customers
     public function store() {

        // Cria um novo registro com os campos acima preenchidos
        Customer::create($this->validateRequest());
        //redireciona para a lista
        return redirect('customers');
     }

     // Exibe o detalhe de cada cadastro
     public function show(Customer $customer)
     {
        return view('customers.show', compact('customer'));
     }

    // Chama o formulário para edição
    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    //Atualiza os dados preenchidos
    public function update(Customer $customer)
    {

        // Atualiza registro com os campos acima preenchidos
        $customer->update($this->validateRequest());
        //redireciona para o detalhe do Customer
        return redirect('customers/' . $customer->id);

    }

    //Apaga o registro
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    // função utilizada em create e update - evitando repetição de código
    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}
