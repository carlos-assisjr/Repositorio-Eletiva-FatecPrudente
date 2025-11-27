<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ids_exclusao'])) {
    $ids = $_POST['ids_exclusao']; // Array com os IDs selecionados

    try {
        $pdo->beginTransaction();

        foreach ($ids as $id_venda) {
            // A. Descobrir qual ingresso foi vendido
            $stmt = $pdo->prepare("SELECT ingresso_id FROM venda WHERE id = ?");
            $stmt->execute([$id_venda]);
            $venda = $stmt->fetch();

            if ($venda) {
                // B. Devolve 1 unidade ao estoque para CADA venda cancelada
                $stmtUpdate = $pdo->prepare("UPDATE ingresso SET quant = quant + 1 WHERE id = ?");
                $stmtUpdate->execute([$venda['ingresso_id']]);

                // C. Exclui a venda
                $stmtDelete = $pdo->prepare("DELETE FROM venda WHERE id = ?");
                $stmtDelete->execute([$id_venda]);
            }
        }

        $pdo->commit();
        header("location: venda.php?excluir=1");
        exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        header("location: venda.php?excluir=0");
        exit;
    }
}
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

    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

// MENSAGENS
if (isset($_GET['cadastro']) && $_GET['cadastro']) echo "<p class='text-success'>Venda realizada!</p>";
if (isset($_GET['excluir']) && $_GET['excluir']) echo "<p class='text-success'>Venda(s) cancelada(s) com sucesso! Estoque atualizado.</p>";
if (isset($_GET['excluir']) && !$_GET['excluir']) echo "<p class='text-danger'>Erro ao cancelar venda!</p>";
?>

<form method="POST" action="venda.php" id="formExclusao">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Histórico de Vendas</h2>
        <div>
            <button type="submit" class="btn btn-danger me-2"
                onclick="return confirm('Tem certeza que deseja cancelar TODAS as vendas selecionadas? Os ingressos voltarão ao estoque.');">
                <i class="bi bi-trash"></i> Cancelar Selecionados
            </button>
            <a href="nova_venda.php" class="btn btn-primary">+ Nova Venda</a>
        </div>
    </div>

    <div style="max-height: 70vh; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 5px;">
        <table class="table table-hover table-striped mb-0">
            <thead class="table-light" style="position: sticky; top: 0; z-index: 1;">
                <tr>
                    <th style="width: 40px;">
                        <input type="checkbox" id="selectAll" class="form-check-input" style="cursor: pointer;">
                    </th>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Evento / Ingresso</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $d): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="ids_exclusao[]" value="<?= $d['id_venda'] ?>" class="form-check-input checkbox-item">
                        </td>

                        <td><?= $d['id_venda'] ?></td>
                        <td>
                            <?= date('d/m/Y', strtotime($d['data_venda'])) ?> <br>
                            <small class="text-muted"><?= date('H:i', strtotime($d['data_venda'])) ?></small>
                        </td>
                        <td><?= $d['cliente_nome'] ?></td>
                        <td>
                            <strong><?= $d['evento_nome'] ?></strong> <br>
                            <span class="badge bg-secondary"><?= $d['ingresso_tipo'] ?></span>
                        </td>
                        <td class="text-success fw-bold">
                            R$ <?= number_format($d['valor'], 2, ',', '.') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</form>
<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.checkbox-item');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>
<?php require("rodape.php"); ?>