@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
            Modificar Compañia
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
            <form method="POST">
             {{method_field('PUT')}}
             {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}

             <div class="form-group">
                <label for="companyName">Nombre Compañia</label>
             <input type="text" name="companyName" id="title" class="form-control" value="{{$Company->companyName}}">
             </div>
 
             <div class="form-group">

                <label for="fundation">Fundación</label>
                <input type="text" name="fundation" id="year" class="form-control" value="{{$Company->fundation}}">

             </div>
 
             <div class="form-group">
                <label for="president">Presidente</label>
                <input type="text" name="president" id="director" class="form-control" value="{{$Company->president}}">

             </div>
 
             <div class="form-group">
               
                <label for="poster">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control" value="{{$Company->poster}}">
             </div>
 
             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Modificar Compañia
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>


@stop





