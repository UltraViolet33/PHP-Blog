<?php $this->view("inc/header", $data); ?>
<h1>Posts</h1>
<div class="row">
    <div class="row">
        <?php foreach ($data['limitPosts'] as $post) : ?>
            <p><?= $post->name ?></p>
        <?php endforeach ?>
    </div>
    <div class="d-flex justify-content-between my-3">
        <?= $data['previousLink'] ?>
        <?= $data['nextLink'] ?>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>