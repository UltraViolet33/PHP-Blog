<?php $this->view("inc/header", $data); ?>
<div class="d-flex flex-column justify-content-center h-100 my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">
                Créer un article
            </h1>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Titre : </label>
                    <input type="text" value="<?= isset($_POST['name']) ? $_POST['name'] : ""; ?>" name='name' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="categories[]">Catégorie(s)</label>
                    <select class="form-select" name="categories[]" multiple="multiple">
                        <?php foreach($allCategories as $category): ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="content">Contenu : </label>
                    <textarea class="form-control" rows="10" name="content"><?= isset($_POST['content']) ? $_POST['content'] : ""; ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="addPost" value="Valider">
            </form>
            <?= checkError() ?>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>