@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                {{-- @include('partials.adminnavigation') --}}
                <h2>Sstudy Management</h2>
            </div>
            <div class="float-right">
            <a class="btn btn-success" href="{{ route('studies.create')}}"><i class="fas fa-plus"></i> New Study</a>
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
                        
                        <form action="{{ route('studies.destroy', $study->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group" role="group" aria-label="actions buttons">
                                <a class="btn btn-secondary" href="{{ route('studies.show', $study->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-secondary" href="{{ route('studies.edit', $study->id) }}"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-secondary"><i class="fas fa-trash-alt"></i> </button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $studies->links() !!}
@endsection