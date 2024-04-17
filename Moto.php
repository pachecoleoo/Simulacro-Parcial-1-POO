<?php
// En la clase Moto:
// 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario).

class Moto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa; //true o false (disponible para la venta o no)


    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of costo
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set the value of costo
     *
     * @return  self
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get the value of anioFabricacion
     */
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    /**
     * Set the value of anioFabricacion
     *
     * @return  self
     */
    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }




    /**
     * Get the value of activa
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set the value of activa
     *
     * @return  self
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }


    /**
     * // 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.  Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: $_venta = $_compra + $_compra * (anio * por_inc_anual)  donde $_compra: es el costo de la moto. anio: cantidad de años transcurridos desde que se fabricó la moto. por_inc_anual: porcentaje de incremento anual de la moto.
     */
    public function darPrecioVenta()
    {
        $precioVenta = -1;

        if ($this->getActiva()) {
            $anioActual = date("Y"); // obtengo el año
            $aniosTrascurridos = $anioActual - $this->getAnioFabricacion();
            $precioVenta = $this->getCosto() + $this->getCosto() * ($aniosTrascurridos * $this->getPorcentajeIncrementoAnual() / 100);
        }
        return $precioVenta;
    }

    /**
     * Get the value of porcentajeIncrementoAnual
     */
    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    /**
     * Set the value of porcentajeIncrementoAnual
     *
     * @return  self
     */
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;

        return $this;
    }
    public function __toString()
    {
        $msj = "";
        $msj .= "\nCodigo: " . $this->getCodigo() .
            "\nCosto: " . $this->getCosto() .
            "\nAño de Fabricación: " . $this->getAnioFabricacion() .
            "\nDescripcion: " . $this->getDescripcion() .
            "\nPorcentaje Incremento Anual: " . $this->getPorcentajeIncrementoAnual() . "%" . "\nEstado: "  . $this->getActiva();
        return $msj;
    }
}
