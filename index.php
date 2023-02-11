<?php 

// Oggi creeremo una pagina in grado di generare una password per gli utenti.
// L'utente potrà scegliere la lunghezza password e ricevere in un alert una password con il numero di caratteri casuali da lui richiesto!
// Lo screen allegato è un riferimento, ma potete variare la grafica.
// Milestone 1: creare un form che invii in GET la lunghezza della password.
// Una nostra funzione utilizzerà questo dato per generare una password casuale
// (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
// Scriviamo tutto (logica e layout) in un unico file index.php
// Milestone 2: verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php
// che includeremo poi nella pagina principale
// Milestone 3: invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
// Milestone 4 (BONUS): gestire ulteriori parametri per la password:
// permettere o meno la ripetizione dello stesso carattere
// Scegliere il set di caratteri tra numeri, lettere, simboli o qualsiasi combinazione di essi (anche tutti, ma almeno uno)
// Milestone 5 (BONUS): Aggiungere la validazione

require __DIR__ .  '/functions.php';

if(isset($_GET['length'])) {
    $result = generate_password($_GET['length']);

    if($result === true) header('Location: success.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container mb-3 pt-3">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="text-white-50">Strong Password Generator</h1>
                    <h2 class="text-white">Genera una password sicura</h2>
                </div>
                <?php if(isset($result)) : ?>
                    <div class="col-7">
                        <div class="alert alert-danger">
                           <strong><?= $result ?></strong>
                        </div>
                    </div>
                <?php endif ?>
                <div class="col-7">
                    <form action="index.php" method="GET" class="p-3 border border-1 rounded-2 bg-light">
                        <div class="row mb-3">
                            <label class="col-sm-7 col-form-label">Lunghezza password:</label>
                            <div class="col-sm-3">
                                <input type="number" name="length" id="lenght" class="form-control" min="5" value="5" step="1">
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-3">Invia</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>