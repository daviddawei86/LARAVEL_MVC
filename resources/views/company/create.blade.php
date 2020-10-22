@extends('layouts.master')

@section('content')
<style>
    body{
        background-color: lightblue;

    }
</style>

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Añadir Compañia
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
             <form method="POST">
             
               {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}
 
             <div class="form-group">
                <label for="title">Nombre Compañia</label>
                <input type="text" name="company_name" id="title" class="form-control">
             </div>
 
             <div class="form-group">

                <label for="year">Fundación</label>
                <input type="text" name="foundation" id="year" class="form-control">

             </div>
 
             <div class="form-group">
                <label for="director">Presidente</label>
                <input type="text" name="president" id="director" class="form-control">

             </div>
 
             <div class="form-group">
               
                <label for="poster">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control">
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Añadir Compañia
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>
 

@stop

