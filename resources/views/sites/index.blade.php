{{-- @extends('sites/layout') --}}
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                @include('partials.adminnavigation')
            </div>
            <div class="float-right">
            <a class="btn btn-success" href="{{ route('sites.create')}}"> <i class="fas fa-plus"></i> New Site</a>
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
                <th>#</th><th>Code</th><th>Name</th><th>Contact Person</th><th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $site->code }}</td>
                    <td>{{ $site->name }}</td>
                    <td>{{ $site->contact_person }}</td>
                    <td>{{ $site->address }}</td>
                    <td>
                    
                    <form action="{{ route('sites.destroy', $site->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group" role="group" aria-label="actions buttons">
                        <a class="btn btn-info" href="{{ route('sites.show', $site->id) }}" title="Show"> <i class="fas fa-eye"></i> </a>
                        <a class="btn btn-warning" href="{{ route('sites.edit', $site->id) }}" title="Edit"> <i class="fas fa-edit"></i> </a>
                        <button type="submit" class="btn btn-danger" title="Delete"> <i class="fas fa-trash-alt"></i> </button>
                        </div>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sites->links() !!}
@endsection