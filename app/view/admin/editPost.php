<?php $this->view("inc/header", $data); ?>
<div class="d-flex flex-column justify-content-center h-100">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">
                Editer article
            </h1>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Titre : </label>
                    <input type="text" value="<?= validateData($post->name) ?>" name='name' class="form-control">
                </div>
                <select class="form-select">
                    <option selected>Open this select menu</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="1"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-group">
                    <label for="content">Contenu : </label>
                    <textarea class="form-control" rows="10" name="content"><?= validateData($post->content) ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="editPost" value="Valider">
            </form>
            <?= checkError() ?>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>