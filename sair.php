<?php

session_start();
ob_start();

unset($_SESSION['nomeUsuario']);

$_SESSION['mensagem'] = "<p class='msgSucesso'>Deslogado com Sucesso!</p>";

header('Location: index.php');
