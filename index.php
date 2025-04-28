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

<!-- BONUS -->
<!-- Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. -->

<!-- Form -->

<!-- Passo I Filtri Tramite URL -->
<form method="GET" class="mb-4">

    <!-- Input Parcheggio -->
    <div class="form-check form-switch mb-3">
        <input class="form-check-input" 
        type="checkbox" 
        id="parkingSwitch" 
        name="parking" 
        value="1" 
        
        <?php if(isset($_GET['parking'])) echo 'checked'; ?>>  <!-- Controllo se il checkbox parking è attivo -->
       
    <label class="form-check-label" for="parkingSwitch">Mostra solo hotel con parcheggio</label>
  </div>

  <!-- BONUS -->
  <!-- Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore) -->

<!-- Input Voto -->
  <div class="mb-3">
    <label class="form-label d-block mb-2">Filtra per voto:</label>

    <!-- Ciclo Per Creare Automaticamente I Checkbox -->
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" 
        type="checkbox" 
        id="vote<?php echo $i; ?>"
        name="vote[]"
        value="<?php echo $i; ?>" 

        <?php if(isset($_GET['vote']) && in_array($i, $_GET['vote'])) echo 'checked'; ?>>  <!-- Controllo quali voti sono stati selezionati -->

        <label class="form-check-label" for="vote<?php echo $i; ?>"><?php echo $i; ?> ★</label>
      </div>

      <!-- Sintassi Alternativa Per Chiudere Il Ciclo -->
    <?php endfor; ?>
  </div>

  <!-- Bottone Di Submit -->
  <button type="submit" class="btn btn-primary">Applica filtri</button>
</form>

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

// Filtri
// Funzione Per Filtrare Gli Array
$filtered_hotels = array_filter($hotels, function($hotel) {
    // Se l'utente seleziona "Mostra solo hotel con parcheggio" e l'hotel non ha parcheggio
    if (isset($_GET['parking']) && !$hotel['parking']) {
        // Scarta quell'hotel
        return false;
    }
    // Se ha selezionato dei voti e l'hotel non ha uno dei voti selezionati
    if (isset($_GET['vote']) && is_array($_GET['vote'])) {
        if (!in_array($hotel['vote'], $_GET['vote'])) {
            // Scarta quell'hotel
            return false;
        }
    }
    // Se l'hotel passa tutti i controlli, teniamo il nuovo array $filtered_hotels
    return true;
});

// Tabella
// Se ci sono hotel filtrati
// Controlla se la variabile contiene elementi
if (!empty($filtered_hotels)) {
    echo "<table class='table table-bordered table-hover'>
      <thead class='table-light'>
        <tr>
          <th>Nome</th>
          <th>Descrizione</th>
          <th>Parcheggio</th>
          <th>Voto</th>
          <th>Distanza dal centro</th>
        </tr>
      </thead>
      <tbody>";
    
    //   Ciclo il nuovo array
    foreach ($filtered_hotels as $hotel) {
        echo "<tr>
          <td>{$hotel['name']}</td>
          <td>{$hotel['description']}</td>
          <td>". ($hotel['parking'] ? '&#10003;' : 'NO') ."</td>
          <td>{$hotel['vote']} ★</td>
          <td>{$hotel['distance_to_center']} km</td>
        </tr>";
    }

    echo "</tbody></table>";
    // Se non ci sono hotel filtrati
} else {
    echo "<div class='alert alert-warning'>Nessun hotel trovato con i filtri selezionati.</div>";
}
?>

</body>
</html>