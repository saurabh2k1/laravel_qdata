@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            @include('partials.adminnavigation')
        </div>
        <div class="float-right">
        <a class="btn btn-success" href="{{ route('register')}}"> <i class="fas fa-plus"></i> New User</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>#</th><th>Name</th><th>Username</th><th>Assigned Sites</th>
            <th>Allocated Studies</th><th>Last Login Details</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->sites as $site)
                        {{$site->name}}
                    @endforeach
                </td>
                <td>
                    @foreach ($user->studies as $study)
                        {{$study->name}}
                    @endforeach
                </td>
                <td>
                    @if ($user->lastLogin()->count())
                        Terminal IP :{{ $user->lastLogin->terminal }} <br> 
                        Timestamp : {{ $user->lastLogin->timestamp->timezone('Asia/Kolkata') }}
                    @else
                        Never login yet!
                    @endif
                    
                </td>    
                <td>
                <a href="{{ route('assignUser', $user)}}" class="btn btn-info">Change Assignment</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection