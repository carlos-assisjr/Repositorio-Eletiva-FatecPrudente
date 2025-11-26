<?php
require("cabecalho.php");
require("conexao.php");
try {
    $stmt = $pdo->query("SELECT * FROM cliente c order BY c.nome");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}
if (isset($_GET['cadastro']) && $_GET['cadastro']) {
    echo "<p class='text-success'>Cadastro realizado!</p>";
} else if (isset($_GET['cadastro']) && !$_GET['cadastro']) {
    echo "<p class='text-danger'>Erro ao cadastrar!</p>";
}
if (isset($_GET['editar']) && $_GET['editar']) {
    echo "<p class='text-success'>Registro editado!</p>";
} else if (isset($_GET['editar']) && !$_GET['editar']) {
    echo "<p class='text-danger'>Erro ao editar!</p>";
}
if (isset($_GET['excluir']) && $_GET['excluir']) {
    echo "<p class='text-success'>Registro excluído!</p>";
} else if (isset($_GET['cadastro']) && !$_GET['cadastro']) {
    echo "<p class='text-danger'>Erro ao excluir!</p>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Clientes Cadastrados</h2>
    <a href="novo_cliente.php" class="btn btn-primary">+ Novo Cliente</a>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['nome'] ?></td>
                <td><?= $d['cpf'] ?></td>
                <td><?= $d['email'] ?></td>
                <td><?= $d['telefone'] ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_cliente.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php"); ?>