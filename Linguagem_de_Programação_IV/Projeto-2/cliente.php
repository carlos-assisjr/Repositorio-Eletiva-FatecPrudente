<?php
require("cabecalho.php");
require("conexao.php");

try {
    // Seleciona todos os clientes ordenados pelo nome
    $stmt = $pdo->query("SELECT * FROM cliente c ORDER BY c.nome");
    $dados = $stmt->fetchAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro ao carregar clientes: " . $e->getMessage() . "</div>";
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Clientes Cadastrados</h2>
    <a href="novo_cliente.php" class="btn btn-primary">Novo Cliente</a>
</div>

<table class="table table-hover table-striped">
    <thead class="table-dark">
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
                    <a href="editar_cliente.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php"); ?>