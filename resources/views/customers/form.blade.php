<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    <div class="">{{ $errors->first('name') }}</div>
</div>


<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') ?? $customer->email }}" class="form-control">
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
    <select name="company_id" id="company_id" class="form-control" value="{{ old('company_id') }}">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
</div>

@csrf
