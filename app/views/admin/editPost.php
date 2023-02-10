<?php $this->view("inc/header", $data); ?>
<div class="d-flex flex-column justify-content-center h-100 my-5">
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
                    <input type="text" value="<?= $this->validateData($post["name"]) ?>" name='name' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="categories[]">Catégorie(s)</label>
                    <select class="form-select" name="categories[]" multiple="multiple">
                        <?php foreach ($allCategories as $category) : ?>
                            <?php if ($category->post) : ?>
                                <option selected="selected" value="<?= $category->id ?>"><?= $this->validateData($category->name) ?></option>
                            <?php else : ?>
                                <option value="<?= $category->id ?>"><?= $this->validateData($category->name) ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="content">Contenu : </label>
                    <textarea class="form-control" rows="10" name="content"><?= $this->validateData($post["content"]) ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="editPost" value="Valider">
            </form>
            <?= $this->checkError() ?>
        </div>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>