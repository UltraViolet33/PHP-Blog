<?php $this->view("inc/header", $data); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="text-center">Profil : <?= $data['profil']["username"]  ?></h1>
            <p>Nom : <?= $data['profil']["username"] ?></p>
            <p>Email: <?= $data['profil']["email"] ?></p>
            <a href="<?= ROOT ?>profil/update" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>