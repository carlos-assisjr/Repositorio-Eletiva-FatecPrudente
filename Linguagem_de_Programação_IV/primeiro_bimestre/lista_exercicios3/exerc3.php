<?php include("cabecalho.php");?>
<h4 class="text-center">verifique se a segunda palavra está contida na primeira</h4>
<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="palavra2" class="form-label">informe uma palavra:</label>
        <input type="text" id="palavra2" name="palavra2" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    $palavra2 = $_POST['palavra2'];

// strpos Função que procura a primeira ocorrência da palavra2 dentro da palavra1.
    $posicao = stripos($palavra, $palavra2);
    if ($posicao !== false) {
        echo "<p>A palavra '$palavra2' está contida em '$palavra' na posição indice $posicao.</p>";
    } else {
        echo "<p>A palavra '$palavra2' NÃO foi encontrada em '$palavra'.</p>";
    }
}
?>
<?php include("rodape.php");?>