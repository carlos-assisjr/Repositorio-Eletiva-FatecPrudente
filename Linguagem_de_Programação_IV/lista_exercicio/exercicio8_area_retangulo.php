<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calcule a área do retângulo </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Calcule a área do retângulo </h1>
    <form method="post" action="exerc8_area_retangulo.php">
      <div class="mb-3">
        <label for="altura" class="form-label">Digite a altura:</label>
        <input type="number" id="altura" name="altura" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="largura" class="form-label">Digite a largura:</label>
        <input type="number" id="largura" name="largura" class="form-control" required="">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>