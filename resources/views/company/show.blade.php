@extends('layouts.master')

@section('content')

<style>
    body{
        background-color: lightblue;

    }
</style>

<div class="row">

    <div class="col-sm-4">
        <img src="{{$Company->poster}}" style="height:200px"/>
    </div>
    <div class="col-sm-8">
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$Company->companyName}}
        </h4>
        <p>Año: {{$Company->fundation}}</p>
        <p>Director: {{$Company->president}}</p>

        <form action="{{action('CompanyController@deleteCompany', $Company->id)}}" 
              method="POST" style="display:inline">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
        </form>

        <!--<a class="btn btn-primary" href="#" role="button">Alquilar película</a>-->
        <a class="btn btn-warning" href="/company/edit/{{$Company->id}}" role="button">Editar la compañia</a>

        <a class="btn btn-outline-dark" href="/company/" role="button">< Volver al listado</a>

    </div>

    <div class="row">
        @foreach( $arrayPeliculas as $pelicula )
        @if($pelicula->company_id == $Company->id )
        <div class="col-xs-6 col-sm-4 col-md-3 text-center">
            <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
                <img src="{{$pelicula->poster}}" style="height:200px"/>
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$pelicula->title}}
                </h4>
            </a>
        </div>
        @endif
        @endforeach
    </div>
</div>
@stop