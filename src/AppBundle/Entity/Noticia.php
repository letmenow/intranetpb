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
 * @ORM\Table(name="Noticia")
 */
class Noticia {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer" , name="NOTI_ID")
     */
    protected $id;

    /**
     * @ORM\Column(type="string" , name="NOTI_TITULO")
     * @Assert\NotBlank()
     */
    protected $titulo;
    
    /**
     * @ORM\Column(type="text" , name="NOTI_RESUMEN")
     */
    protected $resumen;
    
    /**
     * @ORM\Column(type="text" , name="NOTI_CONTENIDO")
     */
    protected $contenido;

    /**
     * @ORM\Column(type="string" , name="NOTI_AUTOR")
     * @Assert\Email()
     */
    protected $autor;

    /**
     * @ORM\Column(type="datetime" , name="NOTI_FECHA")
     * @Assert\DateTime()
     */
    protected $fecha;
    
    function getResumen() {
        return $this->resumen;
    }

     function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setResumen($resumen) {
        $this->resumen = $resumen;
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
