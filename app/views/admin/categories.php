<?php

use App\helpers\Session;

 $this->view("inc/header", $data); ?>
<h1 class="text-center">Les Catégories</h1>
<a class="btn btn-primary" href="<?= ROOT ?>admin/categories/create">Ajouter une catégorie</a>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <th scope="row"><?= $category->id ?></th>
                    <td><a href="<?= ROOT ?>post/category/<?= $category->id ?>" class="btn btn-primary"><?= $this->validateData($category->name) ?></a></td>
                    <td><a href="<?= ROOT ?>admin/categories/update/<?= $category->id ?>" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form onsubmit="return confirm('Voulez vous supprimer cette catégorie ?')" action="<?= ROOT ?>admin/categories/delete/<?= $category->id ?>" method="POST">
                            <input hidden="hidden" name="token" value="<?= Session::get("token") ?>">
                            <button type="submit" name="deleteCategories" class="btn btn-warning">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between my-3">
    <?= $data['previousLink'] ?>
    <?= $data['nextLink'] ?>
</div>
</div>
<?php $this->view("inc/footer", $data); ?>