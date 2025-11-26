<?php
require("cabecalho.php");
require("conexao.php");

// Variáveis iniciais
$resultados = [];
$total_geral = 0;
$pesquisa_realizada = false;

// Lógica ao clicar em "Gerar Relatório"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesquisa_realizada = true;

    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // AJUSTE IMPORTANTE: 
    // O banco salva a hora exata (DATETIME).
    // Se o usuário buscar de 01/01 a 05/01, temos que buscar desde o primeiro segundo
    // do dia 01 até o último segundo do dia 05.
    $inicio_formatado = $data_inicio . ' 00:00:00';
    $fim_formatado = $data_fim . ' 23:59:59';

    try {
        // JOIN entre as 4 tabelas para trazer os nomes em vez de só IDs
        $sql = "SELECT 
                        v.id AS id_venda,
                        v.data_venda,
                        c.nome AS nome_cliente,
                        e.nome AS nome_evento,
                        i.tipo AS tipo_ingresso,
                        i.valor
                    FROM venda v
                    INNER JOIN cliente c ON v.cliente_id = c.id
                    INNER JOIN ingresso i ON v.ingresso_id = i.id
                    INNER JOIN evento e ON i.evento_id = e.id
                    WHERE v.data_venda BETWEEN ? AND ?
                    ORDER BY v.data_venda DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$inicio_formatado, $fim_formatado]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao gerar relatório: " . $e->getMessage() . "</div>";
    }
}
?>

<div class="card mt-4 mb-4 no-print shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">📊 Relatório de Vendas por Período</h4>
    </div>
    <div class="card-body">
        <form method="POST" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="data_inicio" class="form-label fw-bold">Data Inicial</label>
                <input type="date" class="form-control" name="data_inicio" required
                    value="<?= isset($_POST['data_inicio']) ? $_POST['data_inicio'] : date('Y-m-01') ?>">
            </div>

            <div class="col-md-4">
                <label for="data_fim" class="form-label fw-bold">Data Final</label>
                <input type="date" class="form-control" name="data_fim" required
                    value="<?= isset($_POST['data_fim']) ? $_POST['data_fim'] : date('Y-m-d') ?>">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    🔍 Pesquisar
                </button>
            </div>
        </form>
    </div>
</div>

<?php if ($pesquisa_realizada): ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Resultados da Pesquisa</h3>
        <button onclick="window.print()" class="btn btn-secondary no-print">
            🖨️ Imprimir / Salvar PDF
        </button>
    </div>

    <?php if (count($resultados) > 0): ?>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Data/Hora</th>
                            <th>Cliente</th>
                            <th>Evento</th>
                            <th>Ingresso</th>
                            <th class="text-end">Valor (R$)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $r): ?>
                            <tr>
                                <td><?= date('d/m/Y H:i', strtotime($r['data_venda'])) ?></td>
                                <td><?= $r['nome_cliente'] ?></td>
                                <td><?= $r['nome_evento'] ?></td>
                                <td><?= $r['tipo_ingresso'] ?></td>
                                <td class="text-end">
                                    <?= number_format($r['valor'], 2, ',', '.') ?>
                                </td>
                            </tr>
                            <?php $total_geral += $r['valor']; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="4" class="text-end fw-bold fs-5">TOTAL DO PERÍODO:</td>
                            <td class="text-end fw-bold fs-5 text-success">
                                R$ <?= number_format($total_geral, 2, ',', '.') ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="mt-2 text-muted text-end">
            <small>Relatório gerado em <?= date('d/m/Y H:i') ?></small>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-3">
            Nenhuma venda encontrada para o período selecionado.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php require("rodape.php"); ?>