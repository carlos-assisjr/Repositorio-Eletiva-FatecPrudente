<?php
session_start();
if (!isset($_SESSION['acesso']))
    header('location: index.php');
?>
<!doctype html>
<html lang="pt-BR">

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Venda de Ingressos Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="principal.php"> Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown2">
                            <li><a class="dropdown-item" href="cliente.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="ingresso.php">Ingressos</a></li>
                            <li><a class="dropdown-item" href="eventos.php">Eventos</a></li>
                            <li><a class="dropdown-item" href="venda.php">Venda</a></li>
                            <li><a class="dropdown-item" href="grafico.php">Gráfico</a></li>
                        </ul>
                        </a>
                </ul>
                </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-3">