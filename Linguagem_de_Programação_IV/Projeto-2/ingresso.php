<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        $stmt = $pdo->query("SELECT i.*, e.nome 
                FROM ingresso i 
                INNER JOIN evento e ON e.id = i.evento_id");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
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
    <h2>Ingressos Disponíveis</h2>
    <a href="novo_ingresso.php" class="btn btn-primary">+ Novo Ingresso</a>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Evento</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Qtd. Restante</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $d): ?>
            <tr>
                <td><?= $d['nome'] ?></td>
                <td><?= $d['tipo'] ?></td>
                <td>R$ <?= number_format($d['valor'], 2, ',', '.') ?></td>
                <td><?= $d['quant'] ?></td>
                <td>
                    <a href="editar_ingresso.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_ingresso.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require("rodape.php"); ?>