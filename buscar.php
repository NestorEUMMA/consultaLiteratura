<?php
include 'include/dbconnect.php';
if(!empty($_POST)){
$descripcion = $_POST['descripcion'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$grupos = $_POST['grupos'];
$division = $_POST['division'];

  $ListarUsuariosMT = "SELECT d.Nombre as 'BODEGA',  p.Descripcion as 'PRODUCTO', p.NoBasico as 'BASICO',  f.Nombre as 'EDITORIAL',  g.Nombre as 'GRUPO', pa.Aplicacion as 'AUTOR', e.existencia as 'EXISTENCIA', e.disponible as 'DISPONIBLE', p.Lista as 'PRECIO', 
  CASE WHEN p.Exento = 'T' THEN 'SI' ELSE 'NO' END as 'EXENTO'
            FROM prg.existencias e
            INNER JOIN prg.productos p on e.PLUProducto = p.PLUProducto
            INNER JOIN prg.divisiones d on e.PLUDivision = d.PLUDivision
INNER JOIN prg.pGrupos g on p.PLUGrupo = g.GrupoId
INNER JOIN prg.fabricantes f on p.PLUFabricante = f.PLUFabricante
INNER JOIN prg.productosaplicaciones pa on p.PLUProducto = pa.ProductoId
            WHERE p.PLUEmpresa = 1 and e.PLUDivision in (1,2,3,11,16) and p.Descripcion LIKE '%$descripcion%' and pa.Aplicacion LIKE '%$autor%' 
            and f.Nombre LIKE '%$editorial%' and g.Nombre LIKE '%$grupos%' and d.Nombre LIKE '%$division%'";

    if($ResultadoUsuariosMT = odbc_exec($conn, $ListarUsuariosMT)){
        if($ResultadoUsuariosMT > 0){
?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <?php
                                               echo"<thead>";
                                                   echo"<tr>";
                                                   echo"<th id=''>BODEGA</th>";
                                                   echo"<th id=''>PRODUCTO</th>";
                                                   echo"<th id=''>EDITORIAL</th>";
                                                   echo"<th id=''>GRUPO</th>";
                                                   echo"<th id=''>AUTOR</th>";
                                                   echo"<th id=''>PRECIO</th>";
                                                   echo"<th id=''>EXENTO</th>";
                                                   echo"<th id=''>EXISTENCIA</th>";
                                                   echo"</tr>";
                                               echo"</thead>";
                                               echo"<tbody>";
                                               while ($row = odbc_fetch_array($ResultadoUsuariosMT))
                                                 {
                                                    echo"<tr>";
                                                    echo"<td>".$row['BODEGA']."</td>";
                                                    echo"<td>".iconv('Windows-1252', "UTF-8",$row['PRODUCTO'])."</td>";
                                                    echo"<td>".$row['EDITORIAL']."</td>";
                                                    echo"<td>".$row['GRUPO']."</td>";
                                                    echo"<td>".$row['AUTOR']."</td>";
                                                    echo"<td>$".$row['PRECIO']."</td>";
                                                    echo"<td>".$row['EXENTO']."</td>";
                                                     echo"<td>".$row['EXISTENCIA']."</td>";
                                                    echo"</tr>";
                                                  }
                                                echo"</tbody>";
                                               ?>
                                    </table>
                                </div>
 <?php
        }else{
            print "No se Encontraron Coincidencias.";
        }
    }else{
        print $conex->error;
    }
} 
 
?>
