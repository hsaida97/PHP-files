<?php
require_once 'data.php';
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>AZN mezenneleri</title>
</head>

<body>
    <div class="container mt-3">
        <div class="box d-flex justify-content-between mb-3">
            <h2><?php print_r($data['@attributes']['Name']) ?></h2>
            <h4><?php print_r($data['@attributes']['Date']) ?></h4>
        </div>
        <input type="text" id="searchInput" class="bg-light text-dark mb-2" onkeyup="searchTable()" placeholder="Valyutanı axtar...">
        <table class="table table-bordered" style="width:40%" id="myTable">
            <thead>
                <tr>
                    <th>Valyuta</th>
                    <th>KOD</th>
                    <th>KURS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['ValType'] as $valType): ?>
                    <?php foreach ($valType['Valute'] as $valute): ?>
                        <tr>
                            <td><?php print_r($valute['Name']) ?></td>
                            <td><?php print_r($valute['@attributes']['Code']) ?></td>
                            <td><?php print_r($valute['Value']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
          function searchTable() {
            const input = document.getElementById('searchInput').value.toUpperCase();
            const rows = document.querySelectorAll('#myTable tbody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const match = Array.from(cells).some(cell => cell.textContent.toUpperCase().includes(input));
                row.style.display = match ? '' : 'none';
            });
        }
        </script>
</body>

</html>