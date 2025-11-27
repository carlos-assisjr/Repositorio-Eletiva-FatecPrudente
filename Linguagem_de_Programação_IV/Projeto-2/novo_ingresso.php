<?php
require("cabecalho.php");
require("conexao.php");

// Busca eventos para o <select>
$eventos = $pdo->query("SELECT * FROM evento")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $stmt = $pdo->prepare("INSERT INTO ingresso (tipo, valor, quant, evento_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['tipo'],$_POST['valor'],
            $_POST['quant'],$_POST['id']]);
        header("location: ingresso.php");
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
<h2>Cadastrar Ingresso</h2>
<form method="post">
    <div class="mb-3">
        <label>Evento Relacionado</label>
        <select name="id" class="form-select" required>
            <option value="">Selecione...</option>
            <?php foreach ($eventos as $e): ?>
                <option value="<?= $e['id'] ?>"><?= $e['nome'] ?> (<?= date('d/m', strtotime($e['data_evento'])) ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Tipo (Ex: VIP, Pista)</label>
        <input type="text" name="tipo" class="form-control" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Valor (R$)</label>
            <input type="number" step="0.01" name="valor" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Quantidade Disponível</label>
            <input type="number" name="quant" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-success px-4">Salvar</button>
    <a href="ingresso.php" class="btn btn-secondary px-4">Cancelar</a>

</form>
<?php require("rodape.php"); ?>