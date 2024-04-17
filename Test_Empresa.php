<?php
include_once "Cliente.php";
include_once "Empresa.php";
include_once "Moto.php";
include_once "Venta.php";

function resumenVentas($array)
{

    if ($array == null) {
        echo "El cliente Solicitado No Tiene Ninguna Venta Registrada En Esta Sucursal.\n";
    } else {
        echo "Listado de Ventas: \n";
        for ($i = 0; $i < count($array); $i++) {
            echo $array[$i] . "\n";
        }
    }
}



//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("Leoanardo", "Pacheco", true, "Carnet", 41347641);
$objCliente2 = new Cliente("Juani", "Loiacono", true, "Libreta", 1238902);

//2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc ", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

// 4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$coleccionMotos = [$objMoto1, $objMoto2, $objMoto3];
$coleccionClientes = [$objCliente1, $objCliente2];
$coleccionVentas = [];
$coleccionCodigosMotos = [11, 12, 13];

$objEmpresa = new Empresa("Alta Gama", "Av. Argenetina 123", $coleccionClientes, $coleccionMotos, $coleccionVentas);

// 5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$objEmpresa->registrarVenta($coleccionCodigosMotos, $objCliente2);


//echo $objEmpresa->retornarMoto(11);
// 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
$coleccionCodigosMotos = [0];
$objEmpresa->registrarVenta($coleccionCodigosMotos, $objCliente2);


// / 7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el  punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$coleccionCodigosMotos = [2];
$objEmpresa->registrarVenta($coleccionCodigosMotos, $objCliente2);


// 8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente1.

$comprasCliente1 = $objEmpresa->retornarVentasXcliente("Carnet", 41347641);
resumenVentas($comprasCliente1);
// 9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente

$comprasCliente2 = $objEmpresa->retornarVentasXcliente("Libreta", 1238902);
resumenVentas($comprasCliente2);


echo $objEmpresa;
