@extends('layouts-admin.master')

@section('title')
Task 5 Fullstack
@endsection

@section('content') 
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Add Data Category</h4>
            <p class="card-description">
                Complete the form below to add category data!
            </p>
            <form class="forms-sample" action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="exampleInputName1">Name * @error('name') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ old('name' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleSelectGender">User Creator * @error('user_id') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                            <select name="user_id" class="form-control" id="exampleSelectGender">
                                <option hidden>Open this to select User!</option>
                                @foreach ($user as $data)
                                    <option value="{{ $data->id }}" @if(old('user_id') == $data->id) selected @endif>{{ $data->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-icon-text mr-2">
                    <i class="ti-file btn-icon-prepend"></i>
                    Submit
                </button>
                <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection

@push('after-scripts')
<!-- Custom js for this page-->
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
  <!-- End custom js for this page-->
@endpush

   