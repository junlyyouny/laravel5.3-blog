<?php
return [
	'name' => "Laravel 学院",
    'title' => 'My Blog',
    'subtitle' => 'http://laravelacademy.org',
    'description' => 'Laravel学院致力于提供优质Laravel中文学习资源',
    'author' => '学院君',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
];