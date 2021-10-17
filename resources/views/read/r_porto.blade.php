@extends('template.readLayout')

@section('r_porto')
<div class="container mt-3 cont">
    <h2>{{$data['title']}}</h2>
    <p>{{$data['body']}}</p>
</div>
@endsection