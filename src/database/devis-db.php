<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';

function getDevis(): array
{
    $pdo = getConnexion();
    $requete_email = $pdo->prepare("SELECT * FROM devis");
    $requete_email->execute();
    $client = $requete_email->fetchAll(PDO::FETCH_ASSOC);
    return $client;
}


function postDevis($nom, $prenom, $telephone, $libelleRue, $ville, $codePostal, $pays, $date, $id_client, $id_prod): void
{
    $pdo = getConnexion();
    // Traiter les données
    // Traitement des données (insertion dans une base de données)
    $requete = $pdo->prepare(query: "INSERT INTO devis (nom, prenom, telephone, libelleRue, ville, codePostal, pays, date ,id_client, id_prod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


    $requete->bindParam(1, $nom);
    $requete->bindParam(2, $prenom);
    $requete->bindParam(3, $telephone);
    $requete->bindParam(4, $libelleRue);
    $requete->bindParam(5, $ville);
    $requete->bindParam(6, $codePostal);
    $requete->bindParam(7, $pays);
    $requete->bindParam(8, $date);
    $requete->bindParam(9, $id_client);
    $requete->bindParam(10, $id_prod);

    // 3. Exécution de la requête
    $requete->execute();

}

function getDevisUser(?int $id_client): array|bool
{
    $pdo = getConnexion();
    $requete = $pdo->prepare("SELECT * FROM devis WHERE id_client = :id");

    $requete->bindValue(':id', $id_client);

    $requete->execute();

    return $requete->fetch(PDO::FETCH_ASSOC);
}

function getDevisParId(?int $id_devis): array|bool
{
    $pdo = getConnexion();
    $requete = $pdo->prepare("SELECT * FROM devis WHERE id_devis = :id");

    $requete->bindValue(':id', $id_devis);

    $requete->execute();

    return $requete->fetch(PDO::FETCH_ASSOC);
}


