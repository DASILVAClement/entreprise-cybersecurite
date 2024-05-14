<header>
    <nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="nav-link" href="<?php BASE_PROJET ?>/index.php">
                <img style="width: 200px; height: 100px;" src="<?php BASE_PROJET ?>/assets/images/logo_sna_blanc.png"
                     class="justify-content-center"
                     alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php BASE_PROJET ?>/personnel-entreprise.php">
                            <button type="button" class="btn bg-white border-2 text-black rounded-3">Personnel de
                                l'entreprise
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php BASE_PROJET ?>/contact.php">
                            <button type="button" class="btn bg-white border-2 text-black rounded-3">Contact
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php BASE_PROJET ?>/index.php">
                            <button type="button" class="btn bg-white border-2 text-black rounded-3">Accueil
                            </button>
                        </a>
                    </li>

                    <?php if (empty($_SESSION)) : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php BASE_PROJET ?>/connexion-compte.php">
                                <button type="button" class="btn bg-white border-2 text-black rounded-3">Connexion
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php BASE_PROJET ?>/creation-compte.php">
                                <button type="button" class="btn bg-white border-2 text-black rounded-3">Inscription
                                </button>
                            </a>
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php BASE_PROJET ?>/deconnexion-compte.php">
                                <button type="button" class="btn btn-danger border-2 text-black rounded-3">
                                    Deconnexion
                                </button>
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="../../public/assets/js/bootstrap.bundle.min.js"></script>
