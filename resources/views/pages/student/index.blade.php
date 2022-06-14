@extends('main')
@section('content')
<div class="col-md-12">
    <h2>Display Student Table</h2>
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
@if($studentData->count() > 0)
<div class="col-md-12">
    <input type="search" class="form-control" id="table_search"> <br>
    <table class="table table-bordered">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>gender</th>
            <th>City</th>
            <th>country</th>
            <th>email</th>
            <th>phone</th>
            <th>status</th>
            <th> Action</th>
        </tr>
        @foreach($studentData as $key => $data)

        <tr>
            <td>{{++$key}}</td>
            <td>{{$data->fname}} {{$data->mname}} {{$data->lname}}</td>
            <td>{{$data->gender}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone}}</td>
            <td>
                @if($data->status == 1)
                <form action="{{url('student/toggleStatus')}}" method="POST">
                    @csrf
                    <input type="hidden" name="sid" value="{{$data->id}}">
                    <button name="submit" value="active" type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button>
                </form>
                @else
                <form action="{{url('student/toggleStatus')}}" method="POST">
                @csrf
                    <input type="hidden" name="sid" value="{{$data->id}}">
                    <button name="submit" value="inactive"  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                </form>
                @endif
            </td>
            <td>
                <a href="{{url('view-student/'.$data->id)}}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> </a>
                <a href="{{url('edit-student/'.$data->id)}}"class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                <a href="{{url('delete-student/'.$data->id)}}" onclick="return confirm('Are you sure you want to delete this?')"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

            </td>
        </tr>
        @endforeach

    </table>
  
  
</div>
@else
<p style="color:red;">No data avilable.</p>
@endif
@endsection