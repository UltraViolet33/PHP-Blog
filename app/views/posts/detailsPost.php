<?php $this->view("inc/header", $data); ?>
<div class="row justify-content-center my-4">
    <div class="col-8">
        <h1 class="text-center"><?= $post["name"] ?></h1>
        <p>Publié le : <?= $post["created_at"] ?> </p>
        <p style="text-align:justify"><?= $post["content"] ?></p>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>