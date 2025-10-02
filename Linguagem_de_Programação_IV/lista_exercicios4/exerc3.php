<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplique um desconto de 10% em todos os produtos com preço acima de R$100,00 e exiba a lista ordenada pelo nome do produto.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Aplique um desconto de 10% em todos os produtos com preço acima de R$100,00 e exiba a lista ordenada pelo nome do produto.</h1>
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $codigo = $_POST['codigo'];
      $nome = $_POST['nome'];
      $preco = $_POST['preco'];

      $produto = [];
   //   for ($i = 0; $i < 5; $i++) {
  //      if ($preco[i] > 100) {
  //        $novo_preco = $$preco[i] - ($$preco[i] * 0.10);
        }
       $produto[$nomes[$i]] = $nome;
  //  }
                uksort($produto, 'strcasecmp');
            // Exibe os contatos
          //  foreach ($produto as $nome =>$preco => $codigo) {
                echo "<p>Nome: $nome - preço: $$preco - codigo: $codigo";
     //       }

   // }//
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>