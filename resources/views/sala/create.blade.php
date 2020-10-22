@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Añadir Sala
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
             <form method="POST">
             
               {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}
 
             <div class="form-group">
                <label for="sala_photo">Foto Sala</label>
                <input type="text" name="sala_photo" id="sala_photo" class="form-control">
             </div>
 
             <div class="form-group">

                <label for="sala_name">Nombre Sala</label>
                <input type="text" name="sala_name" id="sala_name" class="form-control">

             </div>
 
             <div class="form-group">
                <label for="capacity">Capacidad Sala</label>
                <input type="text" name="capacity" id="capacity" class="form-control">

             </div> 
             
              <div class="form-group">
                <label hidden for="local_id">ID LOCAL</label>
                <input hidden type="text" name="local_id" id="local_id" class="form-control" value="{{$Local->id}}">

             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Añadir Sala
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>
 

@stop

