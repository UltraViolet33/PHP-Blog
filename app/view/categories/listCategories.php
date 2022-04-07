<?php $this->view("inc/header", $data); ?>
<h1>Categories</h1>
<div class="row">
    <?php foreach ($data['limitCategories'] as $category) : ?>
        <p><?= $category->name ?></p>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-3">
    <?= $data['previousLink'] ?>
    <?= $data['nextLink'] ?>
</div>
<?php $this->view("inc/footer", $data); ?>