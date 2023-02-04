<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog</title>
</head>


<body class="d-flex flex-column min-vh-100 ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid ">
            <a href="<?= ROOT ?>post" class="navbar-brand text-white">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= ROOT ?>post" class="nav-link text-white">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ROOT ?>category" class="nav-link text-white">Categories</a>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a href="<?= ROOT ?>profil" class="nav-link text-white"><?= $_SESSION['user']['userName'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ROOT ?>logout" onclick="return confirm()" class="nav-link text-white">Se déconnecter</a>
                        </li>
                        <?php if ($_SESSION['user']['isAdmin'] == 1) : ?>
                            <li class="nav-item">
                                <a href="<?= ROOT ?>admin/posts" class="nav-link text-white">ArticlesAdmin</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ROOT ?>admin/categories" class="nav-link text-white">CategoriesAdmin</a>
                            </li>
                        <?php endif ?>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?= ROOT ?>login" class="nav-link text-white">Se connecter</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4 h-100">