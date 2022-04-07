<?php $this->view("inc/header", $data); ?>
<h1>Posts</h1>
<div class="row">
    <?php foreach ($data['limitPosts'] as $post) : ?>
        <div class="col my-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= validateData($post->name) ?></h5>
                    <p><?= validateData($post->created_at) ?></p>
                    <p class="card-text"><?= validateData($post->content) ?></p>
                    <a href="<?= ROOT?>post/details/<?= $post->id ?>" class="btn btn-primary">Lire l'article</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-3">
    <?= $data['previousLink'] ?>
    <?= $data['nextLink'] ?>
</div>
</div>

<?php $this->view("inc/footer", $data); ?>