<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';


function getProduits(): array
{
    $pdo = getConnexion();
    // 2. Préparation de la requête
    $requete = $pdo->prepare("SELECT * FROM produit");

// 3. Exécution de la requête
    $requete->execute();

// 4. Récupération des enregistrements
// Un enregistrement = un tableau associatif
    return $requete->fetchAll(PDO::FETCH_ASSOC);

}