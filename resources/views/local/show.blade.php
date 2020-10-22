@extends('layouts.master')

@section('content')
<?php
//print_r($list);
//foreach ($list as $key) {
//  print_r($key);
// echo "<br><br>";
//}
?>
<style>
    body{
        background-color: lightblue;

    }
</style>

<div  class="row">

    <div class="col-sm-4" position="relative">
        <iframe src="{{$Local->google_maps}}" 
            width="350" height="300" frameborder="0" style="border:" allowfullscreen>   
        </iframe>
    </div>
    <div style="border: solid 1px #000000 " class="col-sm-8">
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$Local->address}}
        </h4>
        <p>Telefono: {{$Local->telephon}}</p>


        <form action="{{action('LocalController@deleteLocal', $Local->id)}}" 
              method="POST" style="display:inline">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Eliminar
            </button>
        </form>
        <!--<a class="btn btn-primary" href="#" role="button">Alquilar película</a>-->
        <a class="btn btn-warning" href="/local/edit/{{$Local->id}}" role="button">Editar local</a>       
        <a class="btn btn-outline-dark" href="/local" role="button">< Volver al listado</a>

    </div>
    

    <h4 style="min-height:45px;margin-top:70px;">
        
        <a class="btn btn-warning" href="/sala/create/{{$Local->id}}" role="button">Añadir Sala</a>  
    </h4>
   
      

    
    @foreach( $list as $key )

    <div style="margin-top: 40px;" class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/sala/show/' . $key->id) }}">
            <img src="{{$key->sala_photo}}" style="height:200px; width:200px;"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$key->sala_name}}
            </h4>

        </a>
    </div>
    @endforeach
</div>




@stop