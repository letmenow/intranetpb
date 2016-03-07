<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="Sugerencia")
 */
class Sugerencia {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer" , name="SUGE_ID")
     */
    protected $id;

    
    /**
     * @ORM\Column(type="string" , name="SUGE_TITULO")
     * @Assert\NotBlank()
     */
    protected $titulo;
    
    /**
     * @ORM\Column(type="text" , name="SUGE_CONTENIDO")
     */
    protected $contenido;
    
    /**
     * @ORM\Column(type="string" , name="SUGE_AUTOR")
     * @Assert\Email()
     */
    protected $autor;

    /**
     * @ORM\Column(type="datetime" , name="SUGE_FECHA")
     * @Assert\DateTime()
     */
    protected $fecha;
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

        
    function getTitulo() {
        return $this->titulo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getAutor() {
        return $this->autor;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
        return $this;
    }

    function setAutor($autor) {
        $this->autor = $autor;
        return $this;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }


}
