<?php
    require("cabecalho.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require("conexao.php");
        $nome = $_POST['nome'];
        $local = $_POST['local'];
        $data = $_POST['data_evento'];
        $desc = $_POST['descricao'];

        try {
            $stmt = $pdo->prepare("INSERT INTO evento (nome, local, data_evento, descricao) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, $local, $data, $desc]);
            header("location: eventos.php");
        } catch(Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
?>
<h2>Novo Evento</h2>
<form method="post">
    <div class="mb-3">
        <label>Nome do Evento</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Data e Hora</label>
            <input type="datetime-local" name="data_evento" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Local</label>
            <input type="text" name="local" class="form-control" required>
        </div>
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<?php require("rodape.php"); ?>