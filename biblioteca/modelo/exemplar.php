<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 2019-03-16
 * Time: 14:56
 */

class exemplar
{
    private $idExemplar;
    private $livro;
    private $tipoLivro;

    public function __construct()
    {
    }

    public function getIdExemplar()
    {
        return $this->idExemplar;
    }

    public function setIdExemplar($idExemplar)
    {
        $this->idExemplar = $idExemplar;
    }

    public function getLivro()
    {
        return $this->livro;
    }

    public function setLivro($livro)
    {
        $this->livro = $livro;
    }

    public function getTipoLivro()
    {
        return $this->tipoLivro;
    }

    public function setTipoLivro($tipoLivro)
    {
        $this->tipoLivro = $tipoLivro;
    }


}