@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Study</h2>
        </div>
        <div class="float-right">
        <a class="btn btn-success" href="{{ route('studies.index')}}">Back</a>
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
 
<form action="{{ route('studies.update', $study->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="code" class="control-label">Code</label>
            <input type="text" name="code" id="code" value="{{$study->code}}" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" id="name" value="{{$study->name}}" class="form-control" >
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