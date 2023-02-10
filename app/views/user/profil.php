<?php $this->view("inc/header", $data) ?>
<div class="container">
    <h1 class="text-center">Profil : <?= $this->validateData($profil["username"])  ?></h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <p>Nom :  <?= $this->validateData($profil["username"])  ?></p>
            <p>Email:  <?= $this->validateData($profil["email"])  ?></p>
            <a href="<?= ROOT ?>user/edit/<?= $data["profil"]["id"] ?>" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>