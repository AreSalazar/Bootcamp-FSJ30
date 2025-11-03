<?php

//Uppercase cuando vamos a utilizar clases en PHP, por eso el archivo se llama Aerolínea.php

class Aerolinea
{
    private $nombre;
    private $cant_aviones;
    private $tipo_aerolinea;
    private $id;

    function __construct($idParam, $nombreParam, $cant_avionesParam, $tipo_aerolineaParam)
    {
        $this->id = $idParam;
        $this->nombre = $nombreParam;
        $this->cant_aviones = $cant_avionesParam;
        $this->tipo_aerolinea = $tipo_aerolineaParam;
    }

    //Ver grabacion a partir de los 15min para ver como sacó los getters y setters

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**********************************************************************
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        //return $this;
    }

    /**********************************************************************
     * Get the value of cant_aviones
     */
    public function getCant_aviones()
    {
        return $this->cant_aviones;
    }

    /**
     * Set the value of cant_aviones
     *
     * @return  self
     */
    public function setCant_aviones($cant_aviones)
    {
        $this->cant_aviones = $cant_aviones;

        //return $this;
    }

    /************************************************************************
     * Get the value of tipo_aerolinea
     */
    public function getTipo_aerolinea()
    {
        return $this->tipo_aerolinea;
    }

    /**
     * Set the value of tipo_aerolinea
     *
     * @return  self
     */
    public function setTipo_aerolinea($tipo_aerolinea)
    {
        $this->tipo_aerolinea = $tipo_aerolinea;

        //return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
?>