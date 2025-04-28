<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  
</head>
<body>

<h1>Hotels</h1>

<!-- Hotel -->
<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// Stampare una tabella con tutti gli hotel e i relativi dati disponibili

// Tabella
echo "<table class='table'>
<thead>
  <tr>
    <th scope='col'>Name</th>
    <th scope='col'>Description</th>
    <th scope='col'>Parking</th>
    <th scope='col'>Vote</th>
    <th scope='col'>Distance To Center</th>
  </tr>
</thead>
<tbody>";

// Ciclo 
foreach ($hotels as $hotel) {
  echo "<tr>
    <td>{$hotel['name']}</td>
    <td>{$hotel['description']}</td>
    <td>{$hotel['parking']}</td>
    <td>{$hotel['vote']}</td>
    <td>{$hotel['distance_to_center']}</td>
  </tr>";
}

echo "</tbody>
</table>";
?>

</body>
</html>