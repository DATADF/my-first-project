@extends('layout')

@section('title', 'Customer List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <form action="customers" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control">
                    <div class="">{{ $errors->first('name') }}</div>
                </div>


                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="form-control">
                    <div class="">{{ $errors->first('email') }}</div>
                </div>

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select Custumer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row my-5">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                {{-- Loop mostra todos os cadastros ativos --}}
                @foreach ($activeCustomers as $activeCustomers)
                    <li>{{ $activeCustomers->name }} <span class="text-muted">({{ $activeCustomers->company->name }})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                {{-- Loop mostra todos os cadastros inativos --}}
                @foreach ($inactiveCustomers as $inactiveCustomers)
                    <li>{{ $inactiveCustomers->name }} <span class="text-muted">({{ $inactiveCustomers->company->name }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <div class="row my-5">
        <div class="col-12">
            @foreach ($companies as $company)
                <h5>{{ $company->name }}</h5>

                <ul>
                    @foreach ($company->customers as $customer)
                        <li>{{ $customer->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>

@endsection
