@extends('sites.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show Site</h2>
        </div>
        <div class="float-right">
        <a class="btn btn-success" href="{{ route('sites.index')}}">Back</a>
        </div>
    </div>
</div>




    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="code" class="control-label">Code</label>
            {{ $site->code }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                {{ $site->name }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="contact_person" class="control-label">Contact Person</label>
                {{ $site->contact_person }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="address" class="control-label">Address</label>
                {{ $site->address }}
            </div>
        </div>
    </div>
   

@endsection