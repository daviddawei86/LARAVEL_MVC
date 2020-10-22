@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Registrarse
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
             <form method="POST">
             
               {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}
 
             <div class="form-group">
               <label for="Nombre">Nombre</label>
            <input type="text" name="name" id="name" class="form-control">
            </div>
 
            <div class="form-group">

               <label for="email">Correo</label>
               <input type="email" name="email" id="email" class="form-control">

            </div>
 
            <div class="form-group">
               <label for="password">Contraseña</label>
               <input type="password" name="password" id="password" class="form-control">

            </div>
              
            <div class="form-group">
               <label for="subscription">Subscripción</label>
               <input type="text" name="subscription" id="subscription" class="form-control">

            </div>

            <div class="form-group">
              
               <label for="userAge">Edad</label>
               <input type="number" name="userAge" id="userAge" class="form-control">
            </div>
 
             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Crear Usuario
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>
 

@stop