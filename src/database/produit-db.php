<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';


function getProduits(): array
{
    $pdo = getConnexion();

    $requete = $pdo->prepare("SELECT * FROM produit");

    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);

}