<?php $this->view("inc/header", $data); ?>
<h1 class="text-center">Les articles</h1>
<a href="<?= ROOT ?>admin/posts/create" class="btn btn-primary">Ajouter un article</a>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts["posts"] as $post) : ?>
                <tr>
                    <th scope="row"><?= $post->id ?></th>
                    <td><a href="<?= ROOT ?>post/details/<?= $post->id ?>" class="btn btn-primary"><?= $this->validateData($post->name) ?></a></td>
                    <td><?= $this->validateData($post->created_at) ?></td>
                    <td><a href="<?= ROOT ?>admin/posts/update/<?= $post->id ?>" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form onsubmit="return confirm('Voulez vous supprimer cet article ?')" action="<?= ROOT ?>admin/posts/delete/<?= $post->id ?>" method="POST">
                            <input hidden="hidden" name="token" value="<?= $token ?>">
                            <button type="submit" name="deletePost" class="btn btn-warning">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between my-3">
    <?= $posts["previousLink"] ?>
    <?= $posts["nextLink"] ?>
</div>
<?php $this->view("inc/footer", $data); ?>