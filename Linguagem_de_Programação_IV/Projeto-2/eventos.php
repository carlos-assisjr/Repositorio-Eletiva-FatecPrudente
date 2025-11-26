<?php
require("cabecalho.php");
require("conexao.php");

try {

    $stmt = $pdo->query("SELECT * FROM evento ORDER BY data_evento DESC");
    $dados = $stmt->fetchAll();
} catch (Exception $d) {
    echo "Erro: " . $d->getMessage();
}
if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success'>Cadastro realizado!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao cadastrar!</p>";
    }
    if (isset($_GET['editar']) && $_GET['editar']){
        echo "<p class='text-success'>Registro editado!</p>";
    } else if (isset($_GET['editar']) && !$_GET['editar']){
        echo "<p class='text-danger'>Erro ao editar!</p>";
    }
    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo "<p class='text-success'>Registro excluído!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao excluir!</p>";
    }
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Eventos Cadastrados</h2>
    <a href="novo_evento.php" class="btn btn-primary">+ Novo Evento</a>
</div>
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
                    <a href="consultar_evento.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">Consultar</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require("rodape.php"); ?>