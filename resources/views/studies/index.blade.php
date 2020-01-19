@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Studies</h2>
            </div>
            <div class="float-right">
            <a class="btn btn-success" href="{{ route('studies.create')}}">Create New Study</a>
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
                <th>#</th><th>Code</th><th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studies as $study)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $study->code }}</td>
                    <td>{{ $study->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('studies.show', $study->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('studies.edit', $study->id) }}">Edit</a>
                        <form action="{{ route('studies.destroy', $study->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $studies->links() !!}
@endsection