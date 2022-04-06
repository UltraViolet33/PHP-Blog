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
                    <label for="user-resetPwd1" class="form-label">Mot de passe : </label>
                    <input type="password" name='user-resetPwd1' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="user-resetPwd2" class="form-label">Confirmez  le mot de passe : </label>
                    <input type="password" name='user-resetPwd2' class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="user-resetPwd" value="Valider">
            </form>
            <?= checkError() ?>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>