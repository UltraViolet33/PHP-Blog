<?php $this->view("inc/header", $data); ?>
<h1>Categories</h1>
<div class="row">
    <?php foreach ($data['limitCategories'] as $category) : ?>
        <div class="col-8 col-md-5  col-lg-4 col-xl-3 m-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= validateData($category->name) ?></h5>
                    <a href="<?= ROOT ?>post/category/<?= $category->id ?>" class="btn btn-primary">Voir les articles</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-3">
    <?= $data['previousLink'] ?>
    <?= $data['nextLink'] ?>
</div>
<?php $this->view("inc/footer", $data); ?>