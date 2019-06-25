<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 04/01/2018
 * Time: 16:31
 */

require_once 'dao/usuarioDAO.php';

// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

$usuario = new usuarioDAO();

$valido = $usuario->logar($login, $senha);

if( $valido == true)
{
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['tipo'] = $valido->getTipo();    
    header('location:index.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    $msg = "Login ou senha inexistente";
    header('location:login.php?msg='.$msg);

}

?>