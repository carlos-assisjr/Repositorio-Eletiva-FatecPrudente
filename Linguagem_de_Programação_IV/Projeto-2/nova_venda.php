<?php
require("cabecalho.php");
require("conexao.php");

// 1. Processar o formulário de venda
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $ingresso_id = $_POST['ingresso_id'];

    // CORREÇÃO AQUI: O nome correto que vem do HTML é 'quantidade'
    $quantidade_desejada = (int)$_POST['quantidade'];

    try {
        $pdo->beginTransaction(); // Inicia transação para segurança

        // Verifica o preço e o estoque atual
        $stmt = $pdo->prepare("SELECT valor, quant FROM ingresso WHERE id = ?");
        $stmt->execute([$ingresso_id]);
        $ingresso = $stmt->fetch();

        // Verifica se tem estoque suficiente para TUDO o que ele pediu
        if ($ingresso && $ingresso['quant'] >= $quantidade_desejada) {

            // A. Registra as Vendas (Loop para criar uma venda por ingresso)
            $sql = "INSERT INTO venda (valor_total, cliente_id, ingresso_id) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            for ($i = 0; $i < $quantidade_desejada; $i++) {
                // Insere uma linha para cada ingresso comprado
                $stmt->execute([$ingresso['valor'], $cliente_id, $ingresso_id]);
            }

            // B. Baixa o Estoque TOTAL de uma vez
            $stmt = $pdo->prepare("UPDATE ingresso SET quant = quant - ? WHERE id = ?");
            $stmt->execute([$quantidade_desejada, $ingresso_id]);

            $pdo->commit(); // Confirma tudo
            header("location: venda.php?status=sucesso");
            exit;
        } else {
            $pdo->rollBack();
            $disponivel = $ingresso ? $ingresso['quant'] : 0;
            echo "<div class='alert alert-warning'>Erro: Estoque insuficiente! Você pediu $quantidade_desejada, mas só temos $disponivel.</div>";
        }
    } catch (Exception $e) {
        $pdo->rollBack(); // Desfaz se der erro
        echo "<div class='alert alert-danger'>Erro na venda: " . $e->getMessage() . "</div>";
    }
}

// 2. Carregar dados para os selects
try {
    $clientes = $pdo->query("SELECT * FROM cliente ORDER BY nome")->fetchAll();

    // Só mostra ingressos com quantidade maior que 0
    $sql_ingressos = "SELECT i.id, i.tipo, i.valor, i.quant, e.nome as evento_nome 
                          FROM ingresso i 
                          INNER JOIN evento e ON i.evento_id = e.id 
                          WHERE i.quant > 0 
                          ORDER BY e.nome";
    $ingressos = $pdo->query($sql_ingressos)->fetchAll();
} catch (Exception $e) {
    echo "Erro ao carregar listas: " . $e->getMessage();
}
?>

<div class="card mt-4 shadow">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Registrar Nova Venda</h4>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-4">
                <label class="form-label fw-bold">Selecione o Cliente</label>
                <div class="input-group">
                    <select name="cliente_id" class="form-select" required>
                        <option value="">-- Escolha um cliente --</option>
                        <?php foreach ($clientes as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= $c['nome'] ?> (CPF: <?= $c['cpf'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <a href="novo_cliente.php" class="btn btn-outline-secondary">Novo Cliente</a>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Selecione o Ingresso</label>
                <select name="ingresso_id" class="form-select" required size="5">
                    <?php if (count($ingressos) == 0): ?>
                        <option disabled>Nenhum ingresso disponível no estoque.</option>
                    <?php endif; ?>

                    <?php foreach ($ingressos as $i): ?>
                        <option value="<?= $i['id'] ?>">
                            EVENTO: <?= $i['evento_nome'] ?> |
                            TIPO: <?= $i['tipo'] ?> |
                            VALOR: R$ <?= number_format($i['valor'], 2, ',', '.') ?> |
                            (Restam: <?= $i['quant'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="mb-4">
                    <label class="form-label fw-bold">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" value="1" min="1" required>
                </div>
                <div class="form-text">Apenas ingressos com estoque disponível aparecem aqui.</div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-lg btn-success">Finalizar Venda</button>
                <a href="principal.php" class="btn btn-light border">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>