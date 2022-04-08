<?php $this->view("inc/header", $data); ?>
<h1 class="text-center">Les articles</h1>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date</th>
                <th scope="col">Categories</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['limitPosts'] as $post) : ?>
                <tr>
                    <th scope="row"><?= $post->id ?></th>
                    <td><a href="<?= ROOT ?>post/details/<?= $post->id ?>" class="btn btn-primary"><?= validateData($post->name) ?></a></td>
                    <td><?= validateData($post->created_at) ?></td>
                    <td><?= $post->categories ?></td>
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