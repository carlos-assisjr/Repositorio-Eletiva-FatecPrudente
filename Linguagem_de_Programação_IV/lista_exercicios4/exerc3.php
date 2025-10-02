<?php include 'cabecalho.php'; ?>
<h4>Aplique um desconto de 10% em todos os produtos com preço acima de R$100</h4>
<form method="post">
  <?php for ($i = 1; $i <= 5; $i++): ?> <!--para adicionar um loop -->
    <div class="row inline-row mb-3">
      <div class="col-md-4">
        <label for="codigo[]" class="form-label">Informe o código do produto:</label>
        <input type="number" id="codigo[]" name="codigo[]" class="form-control" required="">
      </div>
      <div class="col-md-4">
        <label for="nome[]" class="form-label">Informe o nome do produto:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="col-md-4">
        <label for="preco[]" class="form-label">Informe o preço do produto:</label>
        <input type="number" id="preco[]" name="preco[]" class="form-control" required="">
      </div>
    </div>
  <?php endfor; ?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $codigos = $_POST["codigo"];
  $nomes = $_POST["nome"];
  $precos = $_POST["preco"];

  $produtos = [];

  // Criar mapa ordenado com desconto aplicado
  for ($i = 0; $i < count($codigos); $i++) {
    $preco = floatval($precos[$i]);
    if ($preco > 100) {
      $preco *= 0.9; // Aplica desconto de 10%
    }
    $produtos[$codigos[$i]] = [
      "nome" => $nomes[$i],
      "preco" => $preco
    ];
  }

  // Ordenar pelo nome do produto
  uasort($produtos, function ($a, $b) {
    return strcmp($a["nome"], $b["nome"]);
  });

  echo "<h5 class='mt-4'> Lista de produtos com desconto aplicada:</h5>";
  foreach ($produtos as $codigo => $dados) {
    echo "<p>Código: $codigo | Nome: {$dados['nome']} | Preço com desconto: R$ " . number_format($dados['preco'], 2, ',', '.') . "</p>";
  }
}
?>
<?php include 'rodape.php'; ?>