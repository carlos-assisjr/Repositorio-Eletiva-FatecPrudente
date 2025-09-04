<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>exercício 4 -lista 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercício 4 -lista 2</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor" class="form-label">informe o valor do produto:</label>
                <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $valor = $_POST["valor"];
            if($valor > 100){
                $valor -= $valor * (15/100);
                echo"<p> o novo valor após desconto de 15%: $valor</p>";
            }else{
                echo"<p>O valor do produto é: $valor<p>";
            }

        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>