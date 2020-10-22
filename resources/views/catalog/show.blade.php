@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-4">
        <img src="{{$Pelicula->poster}}" style="height:200px"/>
    </div>
    <div class="col-sm-8">
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$Pelicula->title}}
        </h4>
          <p>Año: {{$Pelicula->year}}</p>
          <p>Director: {{$Pelicula->director}}</p>
          <p>Resumen: {{$Pelicula->synopsis}}</p>
          @if($Pelicula->rented)
            @php ($estado = "Película actualmente alquilada")
          @else
            @php ($estado = "Película disponible")
          @endif
          <p>Estado: {{$estado}}</p>
          <p>Compañia: {{$Company->companyName}}
            <img src="{{$Company->poster}}" style="height:50px"/>
          </p>
          <p>Edad minima: {{$Pelicula->minAge}} años</p>

          @if($list->count() > 0)
          <form action="{{action('CatalogController@putReturn', $Pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Devolver película
            </button>
        </form>
          <!-- <a class="btn btn-danger" href="#" role="button">Devolver película</a>-->
          @else
          <form action="{{action('CatalogController@putRent', $Pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary" style="display:inline">
                Alquilar película
            </button>
        </form>
          <!--<a class="btn btn-primary" href="#" role="button">Alquilar película</a>-->
          @endif
    
          <a class="btn btn-outline-dark" href="/catalog" role="button">< Volver al listado</a>
          @if($rol->count() > 0)
          <form action="{{action('MoviesController@getShow', $Pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary" style="display:inline">
                Usuarios con alquiler
            </button>
        </form>
          <a class="btn btn-warning" href="/catalog/edit/{{$Pelicula->id}}" role="button">Editar la película</a>
        
          <form action="{{action('CatalogController@deleteMovie', $Pelicula->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
        </form>
        @endif
        </div>
</div>
@stop