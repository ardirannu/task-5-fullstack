@extends('layouts-admin.master')

@section('title')
Task 5 Fullstack
@endsection

@section('content') 
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Add Data Article</h4>
            <p class="card-description">
                Complete the form below to add article data!
            </p>
            <form class="forms-sample" action="{{ route('article.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="exampleInputName1">Title * @error('title') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{ old('title' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                        <label for="exampleInputName1">Content * @error('content') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                        <input type="text" name="content" class="form-control" id="exampleInputName1" placeholder="Content" value="{{ old('content' ) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image @error('image') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Select image here!">
                              <span class="input-group-append">
                                <button type="button" class="file-upload-browse btn btn-primary btn-icon-text">
                                  <i class="ti-upload btn-icon-prepend"></i>                                                    
                                  Upload
                                </button>
                              </span>
                            </div>
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
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleSelectGender">Category * @error('category_id') <b class="text-danger"> {{ "(".$message.")" }} </b> @enderror</label>
                            <select name="category_id" class="form-control" id="exampleSelectGender">
                                <option hidden>Open this to select Category!</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}" @if(old('category_id') == $data->id) selected @endif>{{ $data->name }}</option>    
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

   