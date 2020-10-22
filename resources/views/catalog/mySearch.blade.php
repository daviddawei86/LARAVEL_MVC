<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.5 Full Text Search Example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

</head>


<body style="background-color:black">
	<div style="background-color:lightblue; font: oblique bold;" class="container">
		<h1>BUSCADOR DE PELICULAS</h1>
                <h3>(Busqueda por palabras)</h3>


		<form method="GET" action="{{ url('/catalog/mySearch') }}">
			<div style="background-color:lightblue" class="row">
				<div class="col-md-6">
					<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
				</div>
				<div class="col-md-6">
					<button class="btn btn-success">Buscar</button>
                                        <a href="{{ url('/catalog') }}" class="btn btn-primary">Volver</a>
				</div>
                            
			</div>
		</form>


		<table style="background-color:lightblue;" class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Año</th>
			</tr>
			@if($movies->count())
				@foreach($movies as $movie)
				<tr>
					<td>{{ $movie->id }}</td>
					<td>{{ $movie->title }}</td>
					<td>{{ $movie->year }}</td>
				</tr>
				@endforeach
			@else
			<tr>
				<td colspan="3">Result not found.</td>
			</tr>
			@endif
		</table>


	</div>
</body>
</html>