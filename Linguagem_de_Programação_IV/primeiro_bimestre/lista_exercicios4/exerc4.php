<?php include 'cabecalho.php'; ?>
<h4>Exiba a lista ordenada pelos preços após a aplicação do imposto.</h4>
<form method="post">
  <?php for ($i = 1; $i <= 5; $i++): ?> <!--para adicionar um loop -->
    <div class="row inline-row mb-3">
      <div class="col-md-4">
        <label for="nome[]" class="form-label">Informe o nome do item:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="col-md-4">
        <label for="preco[]" class="form-label">Informe o preço do item:</label>
        <input type="number" id="preco[]" name="preco[]" class="form-control" required="">
      </div>
    </div>
  <?php endfor; ?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomes = $_POST["nome"];
  $precos = $_POST["preco"];

  $itens = [];

  // Aplica imposto e cria mapa com nome como chave
  for ($i = 0; $i < count($nomes); $i++) {
    $preco_com_imposto = floatval($precos[$i]) * 1.15;
    $itens[$nomes[$i]] = $preco_com_imposto;
  }

  // Ordena pelos preços com imposto
  asort($itens);

  echo "<h5 class='mt-4'>📋 Lista de Itens com Imposto Aplicado de 15%</h5><ul class='list-group'>";
  foreach ($itens as $nome => $preco) {
    echo "<li class='list-group-item'>Nome: $nome | Preço com imposto: R$ " . number_format($preco, 2, ',', '.') . "</li>";
  }
  echo "</ul>";
}
?>
<?php include 'rodape.php'; ?>