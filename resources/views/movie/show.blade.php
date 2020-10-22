@extends('layouts.master')
@section('content')
<table>
    <tr>
      <th>Usuario</th>
      <th>Correo</th>
    </tr>
    <?php
//print_r($list);
foreach ($list as $key) { 
    ?>
    <tr>
      <td><?= $key->name ?></td>
      <td><?= $key->email ?></td>
    </tr>
    <?php
}
?>
  </table>
@stop