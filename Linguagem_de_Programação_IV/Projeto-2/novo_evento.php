<?php
require("cabecalho.php");
require("conexao.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $local = $_POST['local'];
    $data = $_POST['data_evento'];
    $desc = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    try {
        $stmt = $pdo->prepare("INSERT INTO evento (nome, local, data_evento, descricao,categoria) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $local, $data, $desc, $categoria]);
        header("location: eventos.php");
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
<h2>Novo Evento</h2>
<form method="post">
    <div class="row">
        <div class="col-md-8 mb-3">
            <label>Nome do Evento</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Tipo</label>
            <select name="categoria" class="form-select" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Show">🎸 Show</option>
                <option value="Teatro">🎭 Teatro</option>
                <option value="Filme">🎬 Filme</option>
                <option value="Palestra">🎤 Palestra</option>
                <option value="Esporte">⚽ Esporte</option>
            </select>
        </div>
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