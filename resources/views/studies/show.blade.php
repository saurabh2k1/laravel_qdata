@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show Study</h2>
        </div>
        <div class="float-right">
        <a class="btn btn-success" href="{{ route('studies.index')}}">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="code" class="control-label">Code</label>
        {{$study->code}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            {{$study->name}}
        </div>
    </div>
</div>

@endsection