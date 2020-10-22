@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        <img src="{{$Sala->sala_photo}}" style="height:200px"/>
    </div>
    <div class="col-sm-8">
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$Sala->sala_name}}
        </h4>
          <p>Telefono: {{$Sala->capacity}}</p>
    
          
        <form action="{{action('SalaController@deleteSala', $Sala->id)}}" 
            method="POST" style="display:inline">
            {{ method_field('delete') }}
            {{ csrf_field() }}
             <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
        </form>
          
          <!--<a class="btn btn-primary" href="#" role="button">Alquilar película</a>-->
          <a class="btn btn-warning" href="/sala/edit/{{$Sala->id}}" role="button">Editar local</a>
          
         
          <a class="btn btn-outline-dark" href="/local/" role="button">Volver al listado</a>
    
    

      




        </div>
</div>
@stop