<?php
    require("cabecalho.php");
    require("conexao.php");

    // 1. Carrega os dados iniciais (Ingresso atual + Lista de Eventos)
    try {
        // Busca todos os eventos para preencher o <select>
        $stmt = $pdo->query("SELECT * FROM evento ORDER BY nome");
        $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Busca os dados do ingresso que será editado
        if(isset($_GET['id'])){
            $stmt = $pdo->prepare("SELECT * FROM ingresso WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $ingresso = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$ingresso){
                header("location: ingressos.php");
                exit;
            }
        }
    } catch(Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao carregar dados: " . $e->getMessage() . "</div>";
    }

    // 2. Processa a atualização
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $valor = $_POST['valor'];
        $quant = $_POST['quant'];
        $id = $_POST['id'];

        try {
            $sql = "UPDATE ingresso SET tipo = ?, valor = ?, quant = ?, id = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$tipo, $valor, $quant, $id, $id]);
            
            header("location: ingresso.php");
            exit;
        } catch(Exception $e) {
            echo "<div class='alert alert-danger'>Erro ao editar: " . $e->getMessage() . "</div>";
        }
    }
?>

<div class="card mt-4">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Editar Ingresso</h4>
    </div>
    <div class="card-body">
        <form method="post">
            <input type="hidden" name="id" value="<?= $ingresso['id'] ?>">
            
            <div class="mb-3">
                <label for="id" class="form-label">Evento Relacionado</label>
                
                <select name="evento_id" class="form-select" required>
                    <?php foreach($eventos as $e): ?>
                        <option value="<?= $e['id'] ?>" <?= ($e['id'] == $ingresso['id']) ? 'selected' : '' ?>>
                            <?= $e['nome'] ?> - <?= date('d/m/Y', strtotime($e['data_evento'])) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo do Ingresso (Ex: VIP, Pista)</label>
                <input type="text" name="tipo" class="form-control" required value="<?= $ingresso['tipo'] ?>">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="valor" class="form-label">Valor Unitário (R$)</label>
                    <input type="number" step="0.01" name="valor" class="form-control" required value="<?= $ingresso['valor'] ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quant" class="form-label">Quantidade em Estoque</label>
                    <input type="number" name="quant" class="form-control" required value="<?= $ingresso['quant'] ?>">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="ingresso.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require("rodape.php"); ?>