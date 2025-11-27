<?php
require("cabecalho.php");
require("conexao.php");

try {
    // 1. Consulta SQL para agrupar vendas por Evento
    // Soma o valor total e conta quantos ingressos foram vendidos por evento
    $sql = "SELECT 
                e.nome AS evento, 
                COUNT(v.id) AS qtd_vendas, 
                SUM(v.valor_total) AS total_receita
            FROM venda v
            INNER JOIN ingresso i ON v.ingresso_id = i.id
            INNER JOIN evento e ON i.evento_id = e.id
            GROUP BY e.id, e.nome";
            
    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2. Preparar os dados para o Gráfico (Arrays separados)
    $nomes_eventos = [];
    $receitas = [];
    $quantidades = [];
    $cores = [];

    foreach ($dados as $d) {
        $nomes_eventos[] = $d['evento'];
        $receitas[] = $d['total_receita'];
        $quantidades[] = $d['qtd_vendas'];
        // Gera uma cor aleatória para cada barra
        $cores[] = 'rgba(' . rand(50, 200) . ', ' . rand(50, 200) . ', ' . rand(50, 200) . ', 0.7)';
    }

    // Transforma os arrays do PHP em texto JSON para o JavaScript ler
    $json_nomes = json_encode($nomes_eventos);
    $json_receitas = json_encode($receitas);

} catch (Exception $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
}
?>

<div class="container mt-4">
    <h2 class="mb-4">📊 Gráfico de Faturamento por Evento</h2>

    <div class="card shadow">
        <div class="card-body">
            <canvas id="meuGrafico" width="400" height="150"></canvas>
        </div>
    </div>
    
    <div class="text-center mt-3">
        <a href="relatorio.php" class="btn btn-secondary">Ver Relatório Detalhado</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Pegando os dados que vieram do PHP
    const nomes = <?php echo $json_nomes; ?>;
    const valores = <?php echo $json_receitas; ?>;

    // Configuração do Gráfico
    const ctx = document.getElementById('meuGrafico').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Tipo do gráfico: 'bar' (barras), 'pie' (pizza), 'line' (linha)
        data: {
            labels: nomes, // Nomes dos eventos (Eixo X)
            datasets: [{
                label: 'Faturamento (R$)',
                data: valores, // Valores em dinheiro (Eixo Y)
                backgroundColor: <?php echo json_encode($cores); ?>,
                borderColor: 'rgba(0,0,0,0.1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false // Esconde a legenda se quiser
                }
            }
        }
    });
</script>

<?php require("rodape.php"); ?>