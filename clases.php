<?php

class Producto{
    protected $idProducto;
    protected $nombre;
    protected $unidad;
    protected $descripcion;
    protected $pvpUnidad;

    public function __construct($idProducto, $nombre, $unidad, $descripcion, $pvpUnidad)
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->unidad = $unidad;
        $this->descripcion = $descripcion;
        $this->pvpUnidad = $pvpUnidad;
    }

    public function getIdProducto() { return $this->idProducto; }
    public function setIdProducto($idProducto) { $this->idProducto = $idProducto; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getUnidad() { return $this->unidad; }
    public function setUnidad($unidad) { $this->unidad = $unidad; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function getPvpUnidad() { return $this->pvpUnidad; }
    public function setPvpUnidad($pvpUnidad) { $this->pvpUnidad = $pvpUnidad; }
}

class Software extends Producto{
    public $descuento;
    public $version;

    public function __construct($idProducto, $nombre, $unidad, $descripcion, $pvpUnidad, $version)
    {
        parent::__construct($idProducto, $nombre, $unidad, $descripcion, $pvpUnidad);
        $this->descuento = 5;
        $this->version = $version;
    }

    public function getDescuento() { return $this->descuento; }
    public function setDescuento($descuento) { $this->descuento = $descuento; }

    public function getVersion() { return $this->version; }
    public function setVersion($version) { $this->version = $version; }

    public function aplicarDescuento(){
        return $this->pvpUnidad - ($this->pvpUnidad * $this->descuento / 100);
    }
}

class Hardware extends Producto{
    public $descuento;
    public $proveedor;

    public function __construct($idProducto, $nombre, $unidad, $descripcion, $pvpUnidad, $proveedor)
    {
        parent::__construct($idProducto, $nombre, $unidad, $descripcion, $pvpUnidad);
        $this->descuento = 10;
        $this->proveedor = $proveedor;
    }

    public function getDescuento() { return $this->descuento; }
    public function setDescuento($descuento) { $this->descuento = $descuento; }

    public function getProveedor() { return $this->proveedor; }
    public function setProveedor($proveedor) { $this->proveedor = $proveedor; }

    public function aplicarDescuento(){
        return $this->pvpUnidad - ($this->pvpUnidad * $this->descuento / 100);
    }
}