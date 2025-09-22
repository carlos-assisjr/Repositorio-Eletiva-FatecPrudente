<?php
include("cabecalho.php");
?>
<h1>Verifique se a data informada é válida e apresente a data em formato dd/mm/YYYY. </h1>
<form method="post">
    <div class="mb-3">
        <label for="dia" class="form-label">informe o dia:</label>
        <input type="number" id="dia" name="dia" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="mes" class="form-label">informe o mês:</label>
        <input type="number" id="mes" name="mes" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">informe o ano:</label>
        <input type="number" id="ano" name="ano" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dia = (int)$_POST['dia'];
    $mes = (int)$_POST['mes'];
    $ano = (int)$_POST['ano'];

    if (checkdate($dia, $mes, $ano)) {
        $data = sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
        echo "<p>data válida: $data</p>";
    } else {
        echo "<p>Data inválida!</p>";
    }
}
include("rodape.php");
?>