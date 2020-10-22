@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
            Modificar Sala
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
            <form method="POST">
             {{method_field('PUT')}}
             {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}

             <div class="form-group">
                <label for="sala_photo">Foto Sala</label>
             <input type="text" name="sala_photo" id="title" class="form-control" value="{{$Sala->sala_photo}}">
             </div>
 
             <div class="form-group">

                <label for="sala_name">Nombre Sala</label>
                <input type="text" name="sala_name" id="year" class="form-control" value="{{$Sala->sala_name}}">

             </div>
 
             <div class="form-group">
                <label for="capacity">Capacidad</label>
                <input type="text" name="capacity" id="director" class="form-control" value="{{$Sala->capacity}}">

             </div>
 
             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Modificar Sala
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>


@stop





