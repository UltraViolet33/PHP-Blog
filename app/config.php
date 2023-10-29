<?php


// use SuperBlog\Model\ArticleRepository;
// use SuperBlog\Persistence\InMemoryArticleRepository;
// use Twig\Environment;
// use Twig\Loader\FilesystemLoader;
use App\Controllers\PostController;


return [
    // Bind an interface to an implementation
    // ArticleRepository::class => create(InMemoryArticleRepository::class),
    'App\controllers\PostController' => DI\autowire('App\controllers\PostController'),
    // Configure Twig
    // Environment::class => function () {
    //     $loader = new FilesystemLoader(__DIR__ . '/../src/SuperBlog/Views');
    //     return new Environment($loader);
    // },
];