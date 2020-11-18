<?php
include('datos.php');

session_start();

function cantidadTotal($idProducto){
    return isset($_SESSION[$idProducto]) ? $_SESSION[$idProducto] : 0 ;
}

function importeTotal($cantidadTotal, $precioConDescuento){
    return $cantidadTotal * $precioConDescuento;
}

if (isset($_POST['enviar'])){
    $idProducto = $_POST["idProducto"];
    $cantidad = $_POST["cantidad"];
    $totalCarro = 0;

    if($cantidad == 0 || $cantidad == ""){
        $_SESSION[$idProducto]=0; 
        unset($_SESSION["carro"][$idProducto]);
    }else{
        if(isset($_SESSION[$idProducto])){ 
            $_SESSION[$idProducto]+=$cantidad; 
            foreach($productos as $producto){
                if($producto->getIdProducto() == $idProducto){
                    $_SESSION["carro"][$idProducto] = $producto;  
                }
            }
        }
        else{
          $_SESSION[$idProducto]=$cantidad;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="mt-3 mr-5 ml-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Descripcion</th>
                    <th>Version</th>
                    <th>Proveedor</th>
                    <th>PVP</th>
                    <th>Desc.</th>
                    <th>Precio con Desc.</th>
                    <th>Cantidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productos)) foreach ($productos as $producto) {?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <tr>
                        <td><?php echo $producto->getIdProducto();?></td>
                        <td><?php echo $producto->getNombre();?></td>
                        <td><?php echo $producto->getUnidad();?></td>
                        <td><?php echo $producto->getDescripcion();?></td>
                        <td><?php if(method_exists($producto, 'getVersion')) echo $producto->getVersion(); else echo "";?></td>
                        <td><?php if(method_exists($producto, 'getProveedor')) echo $producto->getProveedor(); else echo "";?></td>
                        <td><?php echo $producto->getPvpUnidad()."€";?></td>
                        <td><?php echo $producto->getDescuento()."%";?></td>
                        <td><?php echo $producto->aplicarDescuento()."€";?></td>
                        <td><?php echo cantidadTotal($producto->getIdProducto());?></td>
                        <td><input type="number" name="cantidad"></td>
                        <td><input type="submit" name="enviar" value="enviar" class="btn btn-primary"></td>
                        <input type="hidden" name="idProducto" value=<?php echo $producto->getIdProducto() ?>>
                    </tr>
                </form>
                <?php }?>
            </tbody>
        </table>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <h1>CESTA</h1>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <th>Nombre</th>
                                    <th>PVP</th>
                                    <th>Descuento</th>
                                    <th>Cantidad</th>
                                    <th>Importe</th>
                                </thead>
                                <tbody>
                                <?php if (isset($_SESSION["carro"])) foreach ($_SESSION["carro"] as $producto) {?>
                                    <tr>
                                        <td><?php echo $producto->getNombre() ?></td>
                                        <td><?php echo $producto->getPvpUnidad() ?></td>
                                        <td><?php echo $producto->getDescuento() ?></td>
                                        <td><?php echo cantidadTotal($producto->getIdProducto()) ?></td>
                                        <td><?php echo importeTotal(cantidadTotal($producto->getIdProducto()), $producto->aplicarDescuento())."€"?></td>
                                        <?php $totalCarro += importeTotal(cantidadTotal($producto->getIdProducto()), $producto->aplicarDescuento()) ?>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer bg-dark text-white"><h2>Total: <?php echo $totalCarro."€"?></h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>