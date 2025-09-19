<?php
include("cabecalho.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];
    if ($valor1 != $valor2) {
        $soma = $valor1 + $valor2;
        echo "<p>A soma dos valores é $soma</p>";
    } else {
        $somax3 = ($valor1 + $valor2) * 3;
        echo "<p>Numeros iguais, soma dos valores X3 é $somax3</p>";
    }
}
?>
<form method="post">
    <div class="mb-3">
        <label for="valor1" class="form-label">informe o valor 1:</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="valor2" class="form-label">informe o valor 2:</label>
        <input type="number" id="valor2" name="valor2" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include("rodape.php");
?>