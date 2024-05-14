<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';

function postDevis($prenom_client, $nom_client, $telephone_client, $ville_client, $rue_client, $cp_client): void
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "INSERT INTO devis (prenom_client, nom_client, telephone_client, ville_client, rue_client, cp_client) VALUES (?, ?, ?, ?, ?, ?)");

    $requete->bindParam(1, $prenom_client);
    $requete->bindParam(2, $nom_client);
    $requete->bindParam(3, $telephone_client);
    $requete->bindParam(4, $ville_client);
    $requete->bindParam(5, $rue_client);
    $requete->bindParam(6, $cp_client);

    $requete->execute();
}