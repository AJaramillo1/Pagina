<?php
include ("conexion.php");
$con=conectar();
  
$id=$_POST['id'];
$nom=$_POST['nombre'];
$edad=$_POST['edad'];
$peso=$_POST['peso'];

$sql="INSERT INTO Corredor VALUES('$id','$nom','$edad','$peso')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: crear.php");
    
}else {
}
?>