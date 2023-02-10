<?php $this->view("inc/header", $data); ?>
<div class="row justify-content-center my-4">
    <div class="col-8">
        <h1 class="text-center"><?= $this->validateData($post["name"]) ?></h1>
        <p>Publié le : <?= $this->validateData($post["created_at"]) ?> </p>
        <p style="text-align:justify"><?= $this->validateData($post["content"]) ?></p>
    </div>
</div>
<?php $this->view("inc/footer", $data); ?>