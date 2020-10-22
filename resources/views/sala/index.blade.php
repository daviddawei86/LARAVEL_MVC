@extends('layouts.master')

@section('content')

<?php
print_r($list);

foreach ($list as $key) {
    print_r($key);
    echo "<br><br>";
}
?>

<div>
    <ul>
        <li class="nav-item {{  Request::is('/sala/create') ? 'active' : ''}}">
            <a  href="{{url('/sala/create')}}">
                Añadir Sala
            </a>
        </li>

</ul>
  
</div>




<div class="row">
    
   
    @foreach( $arraySalas as $sala )
   
    
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/sala/show/' . $sala->id_sala) }}">
            <img src="{{$sala->sala_photo}}" style="height:200px; width:200px;"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$sala->sala_name}}
            </h4>
            
        </a>
    </div>
 
    @endforeach
</div>


@stop
