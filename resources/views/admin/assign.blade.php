@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            @include('partials.adminnavigation')
        </div>
        <div class="float-right">
        {{-- <a class="btn btn-success" href="{{ route('register')}}">Create New User</a> --}}
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-lg-10 margin-tb">
        <form action="{{ route('assignUser', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name" class="control-label">name</label>
                        <b>{{ $user->name }}</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name" class="control-label">Assign Site</label>
                        <select class="custom-select" name="sites[]" id="site" multiple >
                            @foreach ($sites as $site)
                        <option value="{{ $site->id }}" {{$user->hasSite($site)? 'selected': ''}}>{{ $site->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name" class="control-label">Assign Study</label>
                        <select class="custom-select" name="studies[]" id="study" multiple >
                            @foreach ($studies as $study)
                        <option value="{{ $study->id }}" {{$user->hasStudy($study)? 'selected': ''}} >{{ $study->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection

