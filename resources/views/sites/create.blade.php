@extends('sites.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Site</h2>
        </div>
        <div class="float-right">
        <a class="btn btn-success" href="{{ route('sites.index')}}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sites.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="code" class="control-label">Code</label>
                <input type="text" name="code" id="code" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="contact_person" class="control-label">Contact Person</label>
                <input type="text" name="contact_person" id="contact_person" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="address" class="control-label">Address</label>
                <textarea name="address" class="form-control" id="address" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection