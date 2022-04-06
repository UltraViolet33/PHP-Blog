<?php $this->view("inc/header", $data); ?>
<h1>Categories</h1>
<?= $data['previousLink'] ?>
<?= $data['nextLink'] ?>
<div class="row">
    <?php foreach ($data['limitCategories'] as $category) : ?>
        <p><?= $category->name ?></p>
    <?php endforeach ?>
</div>
<?php $this->view("inc/footer", $data); ?>