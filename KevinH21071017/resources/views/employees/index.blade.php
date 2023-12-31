@extends('employees.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Ktp</th>
        <th>Adress</th>
        <th>Mobile_phone</th>
        <th>Date_of_birth</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($employees as $employee)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $employee->nama }}</td>
        <td>{{ $employee->ktp }}</td>
        <td>{{ $employee->adress }}</td>
        <td>{{ $employee->mobile_phone }}</td>
        <td>{{ $employee->date_of_birth }}</td>
        <td>
            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $employees->links() !!}

@endsection