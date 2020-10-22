@extends('layouts.master')

@section('content')
@include('cookieConsent::index')

<style>
    body{
        background-color: lightblue;

    }
</style>

<div style="margin-bottom: 25px;" class="col-md-5" align="left">
    <a href="{{ url('/catalog/pdf') }}" class="btn btn-danger">PDF</a>
     <a href="{{ url('/catalog/excel') }}" class="btn btn-danger">EXCEL</a>
     <a style="margin-left: 100px" href="{{ url('/catalog/mySearch') }}" class="btn btn-primary">Buscar Pelicula</a>
    
</div>



<div class="row">
    @foreach( $arrayPeliculas as $pelicula )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
            <img src="{{$pelicula->poster}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$pelicula->title}}
            </h4>
        </a>
    </div>
    @endforeach
</div>


@stop

