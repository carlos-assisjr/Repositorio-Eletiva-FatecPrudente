<?php
require("cabecalho.php");
require("conexao.php");

try {
    $sql = "SELECT 
                e.nome AS evento, 
                COUNT(v.id) AS qtd_vendas, 
                SUM(v.valor_total) AS total_receita
            FROM venda v
            INNER JOIN ingresso i ON v.ingresso_id = i.id
            INNER JOIN evento e ON i.evento_id = e.id
            GROUP BY e.id, e.nome
            ORDER BY total_receita DESC"; // Ordenar do maior para o menor 
    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Arrays para o JS
    $nomes = [];
    $valores = [];
    $quantidades = [];

    foreach ($dados as $d) {
        $nomes[] = $d['evento']; // Eixo X
        $valores[] = $d['total_receita']; // Eixo Y
        $quantidades[] = $d['qtd_vendas']; // Info extra para o tooltip
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header bg-dark text-white p-4 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-bar-chart-line-fill me-2"></i> Faturamento por Evento</h4>
                    <span class="badge bg-success p-2">Total Atualizado</span>
                </div>
                
                <div class="card-body p-4">
                    <div style="position: relative; height: 400px; width: 100%;">
                        <canvas id="meuGrafico"></canvas>
                    </div>
                </div>
                
                <div class="card-footer bg-white border-0  pb-4">
                    <a href="principal.php" class="btn btn-outline-secondary rounded-pill px-4 me-2">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>

                    <a href="relatorio.php" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-table"></i> Ver Tabela de Dados
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('meuGrafico').getContext('2d');

    // Cria um Gradiente
    let gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)'); // Azul topo
    gradient.addColorStop(1, 'rgba(153, 102, 255, 0.8)'); // Roxo base

    const myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: <?php echo json_encode($nomes); ?>,
            datasets: [{
                label: 'Faturamento',
                data: <?php echo json_encode($valores); ?>,
                backgroundColor: gradient, // Usa o gradiente criado acima
                borderRadius: 8, // Barras arredondadas 
                borderWidth: 0,
                barPercentage: 0.6, // Largura da barra 
                // Dados extras para usar no tooltip (quantidades)
                extraData: <?php echo json_encode($quantidades); ?> 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Esconde a legenda 
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 15,
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 14 },
                    callbacks: {
                        // Formata o valor para R$ no tooltip (ao passar o mouse)
                        label: function(context) {
                            let valor = context.raw;
                            let qtd = context.dataset.extraData[context.dataIndex]; // Pega a quantidade
                            
                            // Formata dinheiro BR
                            let dinheiro = new Intl.NumberFormat('pt-BR', { 
                                style: 'currency', 
                                currency: 'BRL' 
                            }).format(valor);

                            return ` Faturamento: ${dinheiro} (${qtd} ingressos)`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f0f0f0', // Linhas de grade bem suaves
                        borderDash: [5, 5] // Linhas tracejadas
                    },
                    ticks: {
                        // Formata o eixo Y para mostrar R$
                        callback: function(value) {
                            return 'R$ ' + value;
                        },
                        font: { size: 12, family: "'Segoe UI', sans-serif" }
                    }
                },
                x: {
                    grid: {
                        display: false // Remove as linhas verticais para limpar o visual
                    },
                    ticks: {
                        font: { size: 13, weight: 'bold' }
                    }
                }
            }
        }
    });
</script>

<?php require("rodape.php"); ?>