<?php
// En la clase Empresa:
// 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de motos y la colección de ventas realizadas.
// 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
// 3. Los métodos de acceso para cada una de las variables instancias de la clase.
// 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
class Empresa
{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;

    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos,  $coleccionVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }

    /**
     * Obtiene el valor de denominacion
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Setea el valor de denominacion
     *
     * @return  self
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Obtiene el valor de coleccionClientes
     */
    public function getColeccionClientes()
    {
        return $this->coleccionClientes;
    }

    /**
     * Setea el valor de coleccionClientes
     *
     * @return  self
     */
    public function setColeccionClientes($coleccionClientes)
    {
        $this->coleccionClientes = $coleccionClientes;

        return $this;
    }

    /**
     * Obtiene el valor de direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Setea el valor de  direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Obtiene el valor de coleccionMotos
     */
    public function getColeccionMotos()
    {
        return $this->coleccionMotos;
    }

    /**
     * Setea el valor de coleccionMotos
     *
     * @return  self
     */
    public function setColeccionMotos($coleccionMotos)
    {
        $this->coleccionMotos = $coleccionMotos;

        return $this;
    }

    /**
     * Obtiene el valor de coleccionVentas
     */
    public function getColeccionVentas()
    {
        return $this->coleccionVentas;
    }

    /**
     * Setea el valor de coleccionVentas
     *
     * @return  self
     */
    public function setColeccionVentas($coleccionVentas)
    {
        $this->coleccionVentas = $coleccionVentas;

        return $this;
    }
    /**
     * 5)  Metodo que recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     * @param int $codigoMoto 
     * @return objeto  
     */
    public function retornarMoto($codigoMoto)
    {
        $objMoto = null;
        $coleccionMotos = $this->getColeccionMotos();
        foreach ($coleccionMotos as $moto) {
            $codigoXmoto = $moto->getCodigo();
            if ($codigoXmoto == $codigoMoto) {
                $objMoto = $moto;
            }
        }

        return $objMoto;
    }

    /**
     * 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por, parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colecció se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. El método debe setear los variables instancias de venta que corresponda y retornar el importe final de lA venta.Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.
     */
    public function registrarVenta($colCodigosMotos, $objCliente)
    {


        $motosTotal = [];
        $precioFinal = 0;
        $estadoPersona = $objCliente->getEstado();

        while ($estadoPersona) {
            $cantidadMotos = Count($this->getColeccionMotos());

            foreach ($colCodigosMotos as $codigoMoto) {
                for ($j = 0; $j < $cantidadMotos; $j++) {
                    $motoColeccion = $this->getColeccionMotos()[$j];
                    $estadoMoto = $motoColeccion->getActiva();
                    if ($codigoMoto == $motoColeccion->getCodigo() && $estadoMoto) {
                        $motosTotal[] =   $motoColeccion;
                        $precioFinal += $motoColeccion->darPrecioVenta();
                    }
                }
            }
            $estadoPersona = false;
        }
        $venta = new Venta(890, date('Y-m-d'), $objCliente, $motosTotal, $precioFinal);

        // Actualizar la colección de ventas si hay una venta
        if ($venta !== null) {
            $ventas = $this->getColeccionVentas();
            $ventas[] = $venta;
            $this->setColeccionVentas($ventas);
        }

        return $precioFinal;
    }
    /** 
     * 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
     */

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $coleccionVentas = $this->getColeccionVentas();
        $ventasCliente = [];
        $u = 0;
        $i = 0;

        // busqueda del cliente a traves de los parametros recibido
        for ($i; $i < count($coleccionVentas); $i++) {

            // verifica si tipo y nro dni son correcto
            if (($coleccionVentas[$i]->getObjCliente()->getTipo() ==  $tipo) && ($coleccionVentas[$i]->getObjCliente()->getDoc() == $numDoc)) {

                // se va almacenando cada venta que realizo el cliente
                $ventasCliente[$u] = $coleccionVentas[$i];

                $u++;
            }
        }

        // retorna una colección con las ventas realizadas al cliente.
        return $ventasCliente;
    }



    public function __toString()
    { // incializacion
        $clientes = $this->getColeccionClientes();
        $motos = $this->getColeccionMotos();
        $ventas = $this->getColeccionVentas();
        $listadoCliente = "";
        $listadoMoto = "";
        $listadoVenta = "";
        $respuesta = "";
        // presentacion de informacion de los atributos de la clase empresa
        $respuesta = "\nInformacion de la Empresa:\n";
        $respuesta .= "*Denominacion: " . $this->getDenominacion() . "\n";
        $respuesta .= "*Direccion: " . $this->getDireccion() . "\n";


        //listado clientes:
        $respuesta .= "*Listado de Clientes: \n";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente = $clientes[$i];
            $listadoCliente .= $cliente . "\n";
        }
        $respuesta .= $listadoCliente;

        //listado motos:    
        $respuesta .= "*Listado de Motos: \n";
        for ($u = 0; $u < count($motos); $u++) {
            $moto = $motos[$u];
            $listadoMoto .= $moto . "\n";
        }
        $respuesta .= $listadoMoto;

        //listado ventas: 
        $respuesta .= "*Listado de ventas: \n";
        for ($y = 0; $y < count($ventas); $y++) {
            $venta = $ventas[$y];
            $listadoVenta .= $venta . "\n";
        }
        $respuesta .= $listadoVenta;


        return $respuesta;
    }
}
