@extends('layouts-admin.master')

@section('title')
    Task 5 Fullstack
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('content')
@include('layouts-admin.flash-message')

<a href="{{ route('category.create') }}" class="btn btn-social-icon-text btn-twitter mb-2"><i class="ti-plus"></i>Add Data</a>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Table Data Category</h4>
          <div class="table-responsive ">
            <table id="table_id" class="text-center table table-striped">
                <thead class="text-light bg-primary">
                    <tr>
                        <th>Action</th>
                        <th>No</th>
                        <th>Name</th>
                        <th>User Creator</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($categories as $no => $data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td class="text-center">
                            <a href="{{ route('category.edit', $data->id) }}" data-id="{{ $data->id }}" class="badge badge-warning btn-edit">Edit</a>
                            <a href="{{ route('category.destroy', $data->id) }}" class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <form id="delete-form" action="{{ route('category.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form> 
                                Hapus
                            </a>
                        </td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->user->name }}</td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
</div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'excel', 'print'
            ]
        } );
        } );
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.js"></script>

@endpush

 