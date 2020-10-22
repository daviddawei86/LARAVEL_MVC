@extends('layouts.master')

@section('content')
<style>
    body{
        background-color: lightblue;

    }
</style>

  <div style="margin-bottom: 15px;" class="col-md-5" align="left">
     <a href="{{ url('/local/pdf') }}" class="btn btn-danger">PDF</a>
      <a href="{{ url('/local/excel') }}" class="btn btn-danger">EXCEL</a>
    </div>


<div>
    <ul>
        <li class="nav-item {{  Request::is('catalog/local/create') ? 'active' : ''}}">
            <a  href="{{url('/local/create')}}">
                Añadir Local
            </a>
        </li>

</ul>
  
</div>


<div class="row">
    @foreach( $arrayLocals as $local )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/local/show/' . $local->id)}}">
            <iframe src="{{$local->google_maps}}" 
                width="200" height="200" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$local->address}}
            </h4>
        </a>
    </div>
    @endforeach
</div>


@stop
