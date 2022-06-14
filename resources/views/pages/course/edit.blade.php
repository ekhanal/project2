
@extends('main')
@section('content')
        <div class="col-md-12">
            <h1 class="mt-2"><i class="fa fa-user"></i> Edit Course</h1>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cname">Course Name </label>
                            <input id="cname" type="text" class="form-control" name="cname" value="{{$editData->cname}}">
                       
                        <a style="color:red;">
                            @error('cname')
                                {{ $message }}
                            @enderror
                        </a>
                     </div>
                     </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">price</label>
                            <input type="text" class="form-control" name="price" value="{{$editData->price}}">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Duration</label>
                            <input type="text" class="form-control" name="Duration" value="{{$editData->Duration}}">
                            <a style="color:red;">
                                @error('Duration')
                                    {{ $message }}
                                @enderror
                            </a>
                        </div>
                    </div>
                </div>
               
                <button class="btn btn-info">Update Course</button>

            </form>
        </div>

@endsection
