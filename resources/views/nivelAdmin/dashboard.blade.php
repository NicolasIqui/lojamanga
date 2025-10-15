<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Usuários por Mês</title>
       <link rel="stylesheet" href="{{('css/dashboard.css')}}">


  <script src="https://www.gstatic.com/charts/loader.js"></script>

    
</head>
<body>
  <h2>Dashboard - Usuários por Mês</h2>

  <!-- Passa os dados do Laravel via data-attribute -->
  <div id="graficoUsuarios" data-usuarios='@json($usuariosPorMes)'></div>

  <script>
    // Pega os dados do data-attribute
    const container = document.getElementById('graficoUsuarios');
    const usuariosPorMes = JSON.parse(container.dataset.usuarios);

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
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
            legend: { position: 'none' },
            bars: 'vertical',
            vAxis: { format: '0' },
            colors: ['#4CAF50']
        };

        const chart = new google.charts.Bar(container);
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</body>
</html>
