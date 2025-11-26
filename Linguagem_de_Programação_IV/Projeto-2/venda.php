<?php
require("cabecalho.php");
require("conexao.php");

// LÓGICA DE CANCELAMENTO (EXCLUSÃO)
if(isset($_GET['excluir_id'])){
    $id = $_GET['excluir_id']; // ID da VENDA

    try {
        $pdo->beginTransaction();

        // 1. Descobrir qual ingresso foi vendido nessa venda para devolver ao estoque
        $stmt = $pdo->prepare("SELECT ingresso_id FROM venda WHERE id = ?");
        $stmt->execute([$id]);
        $venda = $stmt->fetch();

        if($venda){
            // 2. Devolve 1 unidade ao estoque
            $stmt = $pdo->prepare("UPDATE ingresso SET quant = quant + 1 WHERE id = ?");
            $stmt->execute([$venda['ingresso_id']]);

            // 3. Exclui a venda
            $stmt = $pdo->prepare("DELETE FROM venda WHERE id = ?");
            $stmt->execute([$id]);

            $pdo->commit();
            // Redireciona para limpar a URL e exibir mensagem
            header("location: venda.php?msg=cancelado");
            exit;
        }
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "<div class='alert alert-danger'>Erro ao cancelar: " . $e->getMessage() . "</div>";
    }
}

// LISTAGEM DAS VENDAS
try {
    $sql = "SELECT 
                v.id AS id_venda,
                v.data_venda,
                v.ingresso_id,
                c.nome AS cliente_nome,
                e.nome AS evento_nome,
                i.tipo AS ingresso_tipo,
                i.valor
            FROM venda v
            INNER JOIN cliente c ON v.cliente_id = c.id
            INNER JOIN ingresso i ON v.ingresso_id = i.id
            INNER JOIN evento e ON i.evento_id = e.id
            ORDER BY v.data_venda DESC";

    $vendas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro ao carregar: " . $e->getMessage() . "</div>";
}
?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Venda realizada com sucesso! O estoque foi atualizado.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['msg']) && $_GET['msg'] == 'cancelado'): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Venda cancelada! O ingresso voltou para o estoque.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Histórico de Vendas</h2>
    <a href="nova_venda.php" class="btn btn-primary">+ Nova Venda</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th> <th>Data</th>
                    <th>Cliente</th>
                    <th>Evento / Ingresso</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $v): ?>
                    <tr>
                        <td><?= $v['id_venda'] ?></td> 
                        
                        <td>
                            <?= date('d/m/Y', strtotime($v['data_venda'])) ?> <br>
                            <small class="text-muted"><?= date('H:i', strtotime($v['data_venda'])) ?></small>
                        </td>
                        <td><?= $v['cliente_nome'] ?></td>
                        <td>
                            <strong><?= $v['evento_nome'] ?></strong> <br>
                            <span class="badge bg-secondary"><?= $v['ingresso_tipo'] ?></span>
                        </td>
                        <td class="text-success fw-bold">
                            R$ <?= number_format($v['valor'], 2, ',', '.') ?>
                        </td>
                        <td>
                            <a href="venda.php?excluir_id=<?= $v['id_venda'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Tem certeza? Isso devolverá o ingresso ao estoque.');">
                                Cancelar Venda
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (count($vendas) == 0): ?>
            <div class="p-4 text-center text-muted">
                Nenhuma venda registrada ainda.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require("rodape.php"); ?>