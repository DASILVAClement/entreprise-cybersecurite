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

function getProduitId(?int $id_prod): array|bool
{
    $pdo = getConnexion();
    $requete = $pdo->prepare("SELECT * FROM produit WHERE id_prod = :id");

    $requete->bindValue(':id', $id_prod);

    $requete->execute();

    return $requete->fetch(PDO::FETCH_ASSOC);
}