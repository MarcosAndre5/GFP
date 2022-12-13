<?php

session_start();
ob_start();

unset($_SESSION['nomeUsuario']);

$_SESSION['mensagemErro'] = "<p class='msgSucesso'>Deslogado com Sucesso!</p>";

header('Location: login.php');
