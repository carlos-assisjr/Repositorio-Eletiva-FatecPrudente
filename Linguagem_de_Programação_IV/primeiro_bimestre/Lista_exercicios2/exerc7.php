<?php include("cabecalho.php"); ?>
<h4 class="text-center">Loop - Soma</h4>
<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">informe numero:</label>
        <input type="number" Sid="numero" name="numero" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $i = 0;
    $soma = 0;
    while ($i <= $numero) {
        $soma += $i;
        $i++;
    }
    echo "<p>a soma dos  números de 1 a {$numero} é:  {$soma} </p>";
}

?>
<?php include("rodape.php"); ?>