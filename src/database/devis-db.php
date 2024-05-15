<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';

function postDevis($id_client, $id_prod, $prenom_client, $nom_client, $telephone_client, $ville_client, $rue_client, $cp_client): void
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "INSERT INTO devis (id_client, id_prod, prenom_client, nom_client, telephone_client, ville_client, rue_client, cp_client) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $requete->bindParam(1, $id_client);
    $requete->bindParam(2, $id_prod);
    $requete->bindParam(3, $prenom_client);
    $requete->bindParam(4, $nom_client);
    $requete->bindParam(5, $telephone_client);
    $requete->bindParam(6, $ville_client);
    $requete->bindParam(7, $rue_client);
    $requete->bindParam(8, $cp_client);

    $requete->execute();
}