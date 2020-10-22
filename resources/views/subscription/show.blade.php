@extends('layouts.master')

@section('content')
<?php 
//print_r($list);
/*
foreach ($list as $key) {
    print_r($key);
    echo "<br><br>";
}*/
?>

<table border="1px">
        <tr>
          <th>User</th>
          <th>Email</th>
        </tr>
        
        <?php 
        foreach ($list as $key) {
            ?>
        <tr>
            <td>
               <?= $key->name;?>
            </td>
            <td>
                <?= $key->email;?>
            </td>
        </tr>
        <?php
        }
        ?>
      </table>



@stop