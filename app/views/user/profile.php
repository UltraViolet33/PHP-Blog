<?php $this->view("inc/header", $data) ?>
<div class="container">
    <h1 class="text-center">Profile : <?= $this->validateData($profile["username"])  ?></h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <p>Nom :  <?= $this->validateData($profile["username"])  ?></p>
            <p>Email:  <?= $this->validateData($profile["email"])  ?></p>
            <a href="<?= ROOT ?>user/edit/<?= $data["profile"]["id_user"] ?>" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>