<?php
require("cabecalho.php");
require("conexao.php");

try {

    $stmt = $pdo->query("SELECT * FROM evento ORDER BY data_evento DESC");
$dados = $stmt->fetchAll();
} catch (Exception $d) {
    echo "Erro: " . $d->getMessage();
}
?>
<h2>Eventos Cadastrados</h2>
<a href="novo_evento.php" class="btn btn-primary mb-3">Novo Evento</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data</th>
            <th>Local</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['nome'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($d['data_evento'])) ?></td>
                <td><?= $d['local'] ?></td>
                <td>
                    <a href="editar_eventos.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require("rodape.php"); ?>