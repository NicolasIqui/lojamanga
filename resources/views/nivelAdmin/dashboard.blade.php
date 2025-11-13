<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuários por Mês</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="content">
        <div class="sidebar">
            <p>Painel ADM</p>
            <a href="/download-csv">baixar csv usuarios</a>
            <a href="/downloadquadrinho-csv">baixar csv quadrinho</a>
            <a href="/downloadmanga-csv">baixar csv  manga</a>
            <a href="/download-pdf" class="btn btn-primary">Baixar PDF</a>
            <a href="/download-pdfmanga">Download pdf manga </a>
            <a href="/download-pdfquadrinho">Download pdf quadrinhos</a>
        </div>

        <div style="display: flex;flex-direction:column">
            <h2>Dashboard</h2>

            <div style="display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">

                <div id="graficoUsuarios"
                    data-usuarios='@json($usuariosPorMes)'
                    style="flex: 1 1 600px; min-width: 550px; max-width: 650px;">
                </div>


                <div id="graficoQuadrinhosMangas"
                    data-quadrinhos="{{ $totalQuadrinhos }}"
                    data-mangas="{{ $totalMangas }}"
                    style="flex: 1 1 400px; min-width: 350px; max-width: 450px;">
                </div>

            </div>
        </div>
    </div>

    <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawUsuariosChart();
            drawQuadrinhosMangasChart();
        }

        // ======== GRÁFICO DE USUÁRIOS ========
        function drawUsuariosChart() {
            const container = document.getElementById('graficoUsuarios');
            const usuariosPorMes = JSON.parse(container.dataset.usuarios);

            const data = new google.visualization.DataTable();
            data.addColumn('string', 'Mês');
            data.addColumn('number', 'Usuários Cadastrados');

            usuariosPorMes.forEach(u => {
                data.addRow([u.mes_nome, u.total]);
            });

            const options = {
                title: 'Usuários cadastrados por mês',
                width: 600,
                height: 400,
                legend: {
                    position: 'none'
                },
                bars: 'vertical',
                vAxis: {
                    format: '0'
                },
                colors: ['#4CAF50']
            };

            const chart = new google.charts.Bar(container);
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        // ======== GRÁFICO DE PIZZA ========
        function drawQuadrinhosMangasChart() {
            const div = document.getElementById('graficoQuadrinhosMangas');
            const totalQuadrinhos = parseInt(div.dataset.quadrinhos);
            const totalMangas = parseInt(div.dataset.mangas);

            const data = google.visualization.arrayToDataTable([
                ['Tipo', 'Quantidade'],
                ['Quadrinhos', totalQuadrinhos],
                ['Mangás', totalMangas]
            ]);

            const options = {
                title: 'Proporção entre Quadrinhos e Mangás',
                width: 400,
                height: 400,
                pieHole: 0.4,
                colors: ['#FFA500', '#2196F3'], // 🟧 Laranja e 🟦 Azul
                legend: {
                    position: 'bottom',
                    textStyle: {
                        fontSize: 14
                    }
                },
                pieSliceTextStyle: {
                    color: 'white'
                },
            };

            const chart = new google.visualization.PieChart(div);
            chart.draw(data, options);
        }
    </script>





</body>

</html>