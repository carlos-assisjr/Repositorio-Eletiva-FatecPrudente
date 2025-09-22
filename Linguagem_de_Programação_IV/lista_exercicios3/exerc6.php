<?php
include("cabecalho.php");
?>
<h1>recebe um número de ponto flutuante e retorna o número arredondado</h1>
<form method="post">
    <div class="mb-3">
        <label for="valor" class="form-label">informe um valor:</label>
        <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor'];
    echo "<p>Valor arredondado de $valor é: " . round($valor) . "</p>";
}
include("rodape.php");
?>