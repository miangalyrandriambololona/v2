<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../inc/connexion.php");
include("../inc/functions.php");

session_start();

$listeObjets = getObjetsMembreConnecte($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mes objets</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/liste_objet.css">
</head>
<body>

<h2>Mes objets</h2>

<div class="table-responsive" style="max-width:600px; margin:auto;">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom de l'objet</th>
            <th>Date de retour (si emprunté)</th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($listeObjets)) : ?>
        <tr><td colspan="2" class="text-center">Aucun objet trouvé.</td></tr>
    <?php else : ?>
        <?php foreach ($listeObjets as $objet) : ?>
            <tr>
                <td><?= htmlspecialchars($objet['nom_objet']) ?></td>
                <td><?= $objet['date_retour'] ? htmlspecialchars($objet['date_retour']) : '-' ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
</div>

<!-- Bootstrap JS Bundle (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
