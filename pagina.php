<?php

session_start();

$usuarioingresado = $_SESSION['nombre'];
?>
</body>
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <body>
  <form method="POST">
      <div class="container-fluid">
            <div class="jumbotron-fluid" style="background-color: rgb(71, 13, 59);">
                <h1 style="color: white" class="text-center">Examen Unidad 3 y 4</h1>
            </div>
      
      <nav class="navbar justify-content-end navbar-dark" style="background-color:rgb(37, 33, 61);">
      <h1 class="text-center" style="color: white" >Bienvenido: Admin  </h1> <h1>__</h1> 
      <?php

               
                echo "<h1 style='color: white'>  $usuarioingresado </h1>";
                ?>
                <button class="btn btn-danger" type="submit" name="btncerrar">Cerrar sesion</button>
                <?php

                    if(isset($_POST['btncerrar']))
                    {
                        session_destroy();
                        header('location: index.php');
                    }
                ?>
    </nav>
         <div class="jumbotron">
            <h1 class="text-center">Lista de Libros</h1>
            <br>
            <form method="POST">
               <button name="crear" class="btn btn-primary " type="submit" >Crear nuevo</button>
            </form>

         
         <?php
            if(isset($_POST['crear']))
            {
                header('location: crear.php');
            }

            if (isset($_POST['editar'])) {

               header('location: editar.php');

            }

            if (isset($_POST['borrar'])) {

               header('location: borrar.php');

            }


         ?>
         
        
       

    <?php
            function obCone() {
               $servidorBD = "localhost";
               $usuarioBD = "root";
               $pwdBD = "";
               $nomBD = "examenu3u4";
               $conBD = mysqli_connect($servidorBD, $usuarioBD, $pwdBD, $nomBD);
               return $conBD;
            }
            function obUsu($conBD) {
               $sql = "SELECT * FROM libros";
               $res = mysqli_query($conBD, $sql);
               $filTa = "";
               if (mysqli_num_rows($res) > 0) {
                  while ($fila = mysqli_fetch_assoc($res)) {
                     $filTa .= "<tr>";
                     $filTa .= "<td>" . $id= $fila["id_libro"] . "</td>";
                     $filTa .= "<td>" . $fila["Nombre"] . "</td>";
                     $filTa .= "<td>" . $fila["Descripcion"] . "</td>";
                     $filTa .= "<td>" . $fila["Precio"] . "</td>";
                     $filTa .= "<td>" . "<button name='editar' type='submit' class='btn btn-success'>Editar</button>" . "</td>";
                     $filTa .= "<td>" . "<button name='borrar' type='submit' class='btn btn-success' href='borrar.php?id=' . $id >Borrar</button>" . "</td>";
                     $filTa .= "</tr>";
                  }  
               }
               else {
                  $filTa .= "<tr>";
                  $filTa .= "<td>Sin resultados</td>";
                  $filTa .= "</tr>";
               }

               return $filTa;
            }
               $conBD = obCone();
               if ($conBD) {
                  $filas = obUsu($conBD);
                  $tabla = "
                  <div class='border-success'>
                     <table class='table table-responsive table-hover'>" ." <tr class='thead-dark'>" ." <th>ID</th>" 
                     ."<th>Nombre</th>" . "<th>Descripcion</th>". "<th>Precio</th>". "<th>Editar</th>". "<th>Eliminar</th>"."</tr>" .$filas . "  </table>" ."</div>"; echo $tabla;
               }
               else {
                  echo "<div class='alert-danger'>La conexión falló: " . mysqli_connect_error() . "</div>";
               }

               
            
         ?>

      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</div>
  </body>