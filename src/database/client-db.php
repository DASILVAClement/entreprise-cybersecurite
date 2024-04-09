<?php

require_once '../base.php';
require_once BASE_PATH . '/src/config/db-config.php';


function getUser($email_client): array
{
    $pdo = getConnexion();
    $requete_email = $pdo->prepare("SELECT * FROM client WHERE email_client=?");
    $requete_email->execute([$email_client]);
    $user = $requete_email->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function postClient($nom_client, $prenom_client, $adresse_client, $email_client, $pseudo_client, $mdp_client): void
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "INSERT INTO client (nom_client, prenom_client, adresse_client, email_client, pseudo_client, mdp_client) VALUES (?, ?, ?, ?, ?, ?)");

    $requete->bindParam(1, $pseudo_utilisateur);
    $requete->bindParam(2, $email_utilisateur);
    $requete->bindParam(3, $email_utilisateur);
    $requete->bindParam(4, $email_utilisateur);
    $requete->bindParam(5, $email_utilisateur);
    $requete->bindParam(6, password_hash($mdp_utilisateur, PASSWORD_DEFAULT));

    // 3. Exécution de la requête
    $requete->execute();
}
