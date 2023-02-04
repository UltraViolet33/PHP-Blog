<?php

include "vendor/autoload.php";
include "app/core/config.php";
include "app/core/functions.php";
include "app/core/controller.php";
include "app/core/database.php";
// fill the BDD with fake data

$faker = Faker\Factory::create('fr_FR');

$db = Database::getInstance();
$db->write('SET FOREIGN_KEY_CHECKS = 0');
$db->write('TRUNCATE TABLE post');
$db->write('TRUNCATE TABLE category');
$db->write('TRUNCATE TABLE post_category');
$db->write('TRUNCATE TABLE user');
$db->write('SET FOREIGN_KEY_CHECKS = 1');

$posts = [];
$categories = [];

// // //insert paints
for ($i = 0; $i < 50; $i++) {
    $db->write("INSERT INTO post SET name='{$faker->sentence(1)}' , created_at='{$faker->date} {$faker->time}', content='{$faker->paragraphs(4, true)}'");
    $posts[] = $db->getLastInsertId();
}

// // // insert categories
for ($i = 0; $i < 7; $i++) {
    $db->write("INSERT INTO category SET name='{$faker->sentence(1)}'");
    $categories[] = $db->getLastInsertId();
}

// // //insert paints categories
foreach ($posts as $post) {
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach ($randomCategories as $category) {
        $db->write("INSERT INTO post_category SET post_id=$post, category_id=$category");
    }
}

// //insert user admin
$password = 'admin';
$password = hash('sha1', $password);
$db->write("INSERT INTO user SET username='admin', email='', password='$password'");
