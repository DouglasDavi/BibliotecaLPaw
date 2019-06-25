<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 2019-03-16
 * Time: 14:49
 */
class emprestimo
{
    private $usuario;
    private $exemplar;
    private $dataEmprestimo;
    private $observacao;
    private $dataDevolucao;
    private $vencimento;
    private $tipo;
    public function __construct()
    {
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
    }
    public function getVencimento()
    {
        return $this->vencimento;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getExemplar()
    {
        return $this->exemplar;
    }
    public function setExemplar($exemplar)
    {
        $this->exemplar = $exemplar;
    }
    public function getDataEmprestimo()
    {
        return $this->dataEmprestimo;
    }
    public function setDataEmprestimo($dataEmprestimo)
    {
        $this->dataEmprestimo = $dataEmprestimo;
    }
    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }
    public function setDataDevolucao($dataDevolucao)
    {
        $this->dataDevolucao = $dataDevolucao;
    }
    public function getObservacao()
    {
        return $this->observacao;
    }
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }
        
}