@extends('main')
@section('content')
<div class="col-md-12">
    <h2>Details of {{$singleData->cname}}</h2> <hr>

</div>
<div class="col-md-12">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{$singleData->cname}}</td>
        </tr>

        <tr>
            <th>price</th>
            <td>{{$singleData->price}}</td>
        </tr>
    </table>
</div>
@endsection