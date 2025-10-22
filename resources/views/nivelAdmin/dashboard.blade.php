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
  <h2>Dashboard</h2>

  <div class="graficos-container">
    <div id="graficoUsuarios" data-usuarios='@json($usuariosPorMes)'></div>

    <div id="graficoTipo"
         data-quadrinhos="{{ $totalQuadrinhos }}"
         data-mangas="{{ $totalMangas }}">
    </div>
  </div>

  <script>
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      drawBarChart();
      drawPieChart();
    }

    function drawBarChart() {
      const container = document.getElementById('graficoUsuarios');
      const usuariosPorMes = JSON.parse(container.dataset.usuarios);

      const data = new google.visualization.DataTable();
      data.addColumn('string', 'Mês');
      data.addColumn('number', 'Usuários Cadastrados');

      usuariosPorMes.forEach(u => data.addRow([u.mes_nome, u.total]));

      const options = {
        title: 'Usuários cadastrados por mês',
        width: 600,
        height: 400,
        legend: { position: 'none' },
        bars: 'vertical',
        vAxis: { format: '0' },
        colors: ['#4CAF50']
      };

      const chart = new google.charts.Bar(container);
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawPieChart() {
      const container = document.getElementById('graficoTipo');
      const totalQuadrinhos = parseInt(container.dataset.quadrinhos);
      const totalMangas = parseInt(container.dataset.mangas);

      const data = google.visualization.arrayToDataTable([
        ['Tipo', 'Quantidade'],
        ['Quadrinhos', totalQuadrinhos],
        ['Mangás', totalMangas]
      ]);

      const options = {
        title: 'Distribuição de Itens',
        width: 400,
        height: 400,
        colors: ['#2196F3', '#FF9800'],
        pieHole: 0.3
      };

      const chart = new google.visualization.PieChart(container);
      chart.draw(data, options);
    }
  </script>

</body>
</html>
