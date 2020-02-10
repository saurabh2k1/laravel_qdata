@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
            <th>#</th><th>Name</th><th>Username</th><th>Roles</th><th>Assigned Sites</th>
            <th>Allocated Studies</th><th>Last Login Details</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                         <label class="badge badge-success">{{ $v }}</label>
                      @endforeach
                    @endif
                  </td>
                <td>
                    @foreach ($user->sites as $site)
                        {{$site->name}} <br>
                    @endforeach
                </td>
                <td>
                    @foreach ($user->studies as $study)
                        {{$study->name}} <br>
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
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    <div class="btn-group" role="group">
                        <a class="btn btn-secondary" href="{{ route('users.show',$user->id) }}">Show</a>
                        <a class="btn btn-secondary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        {!! Form::submit('Delete', ['class' => 'btn btn-secondary']) !!}
                    </div>
                    {!! Form::close() !!}
                <a href="{{ route('assignUser', $user)}}" class="btn btn-info">Change Assignment</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection