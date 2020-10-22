@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
            Modificar Local
          </div>
          <div class="card-body" style="padding:30px">
 
             {{-- TODO: Abrir el formulario e indicar el método POST --}}
            <form method="POST">
             {{method_field('PUT')}}
             {{-- TODO: Protección contra CSRF --}}
             {{ csrf_field() }}

             <div class="form-group">
                <label for="google_maps">Google Maps</label>
             <input type="text" name="google_maps" id="title" class="form-control" value="{{$Local->google_maps}}">
             </div>
 
             <div class="form-group">

                <label for="address">Dirección</label>
                <input type="text" name="address" id="year" class="form-control" value="{{$Local->address}}">

             </div>
 
             <div class="form-group">
                <label for="telephon">Teléfono</label>
                <input type="text" name="telephon" id="director" class="form-control" value="{{$Local->telephon}}">

             </div>
 
             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 75px;margin-top:25px;">
                    Modificar Local
                </button>
             </div>
 
             {{-- TODO: Cerrar formulario --}}
            </form>
          </div>
       </div>
    </div>
 </div>


@stop





