@extends('main')
@section('content')
<div class="col-md-12">
    <h2>Details of {{$singleData->fname}}</h2> <hr>

</div>
<div class="col-md-12">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{$singleData->fname}}</td>
        
        </tr>

        <tr>
            <th>Gender</th>
            <td>{{$singleData->gender}}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{$singleData->country}}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{$singleData->country}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$singleData->email}}</td>
        </tr>
    </table>

  <a class="btn btn-info text-light" href="{{route('displayStudent')}}">BACK</a> 

</div>
@endsection