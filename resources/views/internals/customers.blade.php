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
                </div>
                <div class="">{{ $errors->first('name') }}</div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="">{{ $errors->first('email') }}</div>
                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row mt-5">
        <div class="col-12">
            <h3>Customers</h3>
            <ul>
                @foreach ($customers as $customer)
                    <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
