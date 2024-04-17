<?php

// En la clase Venta:
// 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de motos y el precio final.
// 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada atributo de la clase.
// 3. Los métodos de acceso de cada uno de los atributos de la clase.
// 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.


class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, Cliente $objCliente, $arrayMotos, $precioFinal)
    {

        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->arrayMotos = $arrayMotos;
        $this->precioFinal = $precioFinal;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }




    /**
     * Get the value of precioFinal
     */
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    /**
     * Set the value of precioFinal
     *
     * @return  self
     */
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;

        return $this;
    }
    /**
     *   // 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada  vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */
    public function incorporarMoto($objMoto)
    {
        $nuevoPrecio = 0;
        if ($objMoto->getActiva()) {
            array_push($arrayMotos, $objMoto);
            $nuevoPrecio = $objMoto->darPrecioVenta();
            $this->setPrecioFinal(+$nuevoPrecio);
        }
    }



    /**
     * Get the value of objCliente
     */
    public function getObjCliente()
    {
        return $this->objCliente;
    }

    /**
     * Set the value of objCliente
     *
     * @return  self
     */
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;

        return $this;
    }

    /**
     * Get the value of arrayMotos
     */
    public function getArrayMotos()
    {
        return $this->arrayMotos;
    }

    /**
     * Set the value of arrayMotos
     *
     * @return  self
     */
    public function setArrayMotos($arrayMotos)
    {
        $this->arrayMotos = $arrayMotos;

        return $this;
    }
    public function __toString()
    {
        $mensaje = "";
        $mensaje .=
            "\nNumero: " . $this->getNumero() .
            "\nFecha: " . $this->getFecha() .
            "\nReferencia Cliente: " . $this->getObjCliente() .

            "\nMotos vendidas: ";
        foreach ($this->getArrayMotos() as $motos) {
            $mensaje .= "\nCodigo: " . $motos->getCodigo();
            $mensaje .= "\nCoste: $" . $motos->getCosto();
            $mensaje .= "\nAño de Fabricación: " . $motos->getAnioFabricacion();
            $mensaje .= "\nDescripcion: " . $motos->getDescripcion();
            $mensaje .= "\nPorcentaje Incremento Anual: %" .
                $motos->getPorcentajeIncrementoAnual();
        }
        $mensaje .= "\nPrecio final: $" . $this->getPrecioFinal();
        return $mensaje;
    }
}
