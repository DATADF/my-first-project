@extends('layout')

@section('title', 'Details for ' . $customer->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Details for {{ $customer->name }}</h1>
            <p><a href="/customers/{{ $customer->id }}/edit" class="btn btn-sm btn-warning">Edit</a></p>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name: </strong>{{ $customer->name }}</p>
            <p><strong>E-mail: </strong>{{ $customer->email }}</p>
            <p><strong>Company: </strong>{{ $customer->company->name }}</p>
            <p><strong>Status: </strong>{{ $customer->active }}</p>


            <form action="/customers/{{ $customer->id }}" method="POST">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-sm btn-danger mb-2">Delete</button>
            </form>
        </div>
    </div>


@endsection
