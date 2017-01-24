<?php
return [
	'name' => "Junlyde Blog",
    'title' => 'Junlyde Blog',
    'subtitle' => 'Based Laravel 5.3',
    'description' => '基于Laravel 5.3，根据学院君博客教程创建',
    'author' => 'Junly',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
];