<?php $this->view("inc/header", $data); ?>
<div class="d-flex flex-column justify-content-center h-100">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">
                Réinitialiser Mot de passe
            </h1>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email : </label>
                    <input type="email" value="<?= isset($_POST['email']) ? $this->validateDate($_POST['email']) : ""; ?>" name='email' class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="user-reset" value="Valider">
            </form>
            <?= $this->checkError() ?>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>