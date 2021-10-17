<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    // Constructor
    public function __construct($args = []) // args es un arreglo por default
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un titulo.';
        }
        if (!$this->precio) {
            self::$errores[] = 'Debes añadir un precio.';
        }
        if (!$this->imagen) {
            self::$errores[] = 'Debes añadir una imagen.';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción debe tener al menos 50 caracteres.';
        }
        if (!$this->habitaciones) {
            self::$errores[] = 'Debes añadir las habitaciones.';
        }
        if (!$this->wc) {
            self::$errores[] = 'Debes añadir los baños.';
        }
        if (!$this->estacionamiento) {
            self::$errores[] = 'Debes añadir los estacionamientos.';
        }
        if (!$this->vendedorId) {
            self::$errores[] = 'Debes añadir un vendedor.';
        }

        return self::$errores;
    }
} 