<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        section {
            padding: 60px 0;
        }
    </style>
    <title>Sports News Area</title>
</head>
<body class="bg-light">
<?php include_once '_partials/menu.php' ?>

<section id="contact">
    <div class="container text-black">
        <h1 class="text-center">Contactez-nous !</h1>
        <p class="text-center">Posez vos questions grâce au formulaire !</p>
        <form class="container mx-auto w-75">
            <div class="container text-center">
                <p class="text-start">Votre adresse mail :</p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="ex: clement@exemple.com"
                           aria-label="ex: clement@exemple.com"
                           aria-describedby="basic-addon1">
                </div>
                <p class="text-start">Votre nom :</p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="ex: Clement"
                           aria-label="ex: Clement"
                           aria-describedby="basic-addon1">
                </div>
                <p class="text-start">Quelle est votre question ?</p>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 150px"></textarea>
                    <label for="floatingTextarea2">Votre question...</label>
                </div>
                <input type="radio" class="btn-check " name="options" id="option1" autocomplete="off">
                <label class="btn btn-danger mt-3" for="option1">Envoyer</label>
            </div>
        </form>
    </div>
</section>

<?php include_once '_partials/pied_page.php' ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>