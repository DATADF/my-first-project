@extends('layout')

@section('title', 'Customer List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
            <p><a href="customers/create">Add New Customer</a></p>
        </div>
    </div>


    <div class="row">
        <div class="col-1">
            <strong>id</strong>
        </div>
        <div class="col-3">
            <strong>Name</strong>
        </div>
        <div class="col-3">
            <strong>E-mail</strong>
        </div>
        <div class="col-3">
            <strong>Company</strong>
        </div>

        <div class="col-2">
            <strong>Status</strong>
        </div>
    </div>
    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-1">
                {{ $customer->id }}
            </div>
            <div class="col-3">
                <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
            </div>
            <div class="col-3">
                {{ $customer->email }}
            </div>
            <div class="col-3">
                {{ $customer->company->name }}
            </div>

            <div class="col-2">
                {{ $customer->active }}
            </div>
        </div>
    @endforeach

@endsection
