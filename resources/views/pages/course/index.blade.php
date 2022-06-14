@extends('main')
@section('content')
<div class="col-md-12">
    <h2>Display Course Table</h2>
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
@if($courseData->count() > 0)
<div class="col-md-12">
    <input type="search" class="form-control" id="table_search"> <br>
    <table class="table table-bordered">
        <tr>
            <th>SN</th>
            <th>cname</th>
            <th>price</th>
            <th>Duration</th>
            <th> Action</th>
        </tr>
        @foreach($courseData as $key => $data)

        <tr>
            <td>{{++$key}}</td>
            <td>{{$data->cname}} </td>
            <td>{{$data->price}}</td>
            <td>{{$data->Duration}}</td>
            <td>
                <a href="{{url('view-course/'.$data->id)}}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> </a>
                <a href="{{url('edit-course/'.$data->id)}}"class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                <a href="{{url('delete-course/'.$data->id)}}" onclick="return confirm('Are you sure you want to delete this?')"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

            </td>
        </tr>
        @endforeach

    </table>
  
  
</div>
@else
<p style="color:red;">No data avilable.</p>
@endif
@endsection