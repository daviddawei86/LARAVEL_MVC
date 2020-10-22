@extends('layouts.master')

@section('content')
<table>
    <tr>
      <th>Pelicula</th>
    </tr>
    <?php
//print_r($list);
foreach ($list as $key) { 
    ?>
    <tr>
      <td><?= $key->title ?></td>
    </tr>
    <?php
}
?>
  </table>
@stop