@extends('layouts.master')

@section('content')

<style>
    body{
        background-color: lightblue;

    }
</style>

<div style="margin-bottom: 15px;" class="col-md-5" align="left">
     <a href="{{ url('/company/pdf') }}" class="btn btn-danger">PDF</a>
          <a href="{{ url('/company/excel') }}" class="btn btn-danger">EXCEL</a>
    </div>

<div>

    <ul>
        <li class="nav-item {{  Request::is('/company/create') ? 'active' : ''}}">
            <a href="{{url('/company/create')}}">

                 Añadir Compañia
            </a>
        </li>
    </ul>
    
</div>
<div class="row">
    @foreach( $arrayCompanies as $company )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/company/show/' . $company->id) }}">
            <img src="{{$company->poster}}" style="height:200px; width:200px;"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$company->companyName}}
            </h4>
        </a>

    </div>
    @endforeach
</div>


@stop
