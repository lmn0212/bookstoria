<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    [
        'title' => 'Пользователи',
        'icon'  => 'fa fa-user',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\User::class))
                ->setPriority(100)
                ->setIcon('fa fa-user'),

            (new Page(\App\Role::class))
                ->setPriority(100)
                ->setIcon('fa fa-user'),
        ]
    ],
    [
        'title' => 'Таксономия',
        'icon'  => 'fa fa-tag',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Category::class))
                ->setPriority(100)
                ->setIcon('fa fa-tag'),

            (new Page(\App\Collection::class))
                ->setPriority(100)
                ->setIcon('fa fa-tag'),
            (new Page(\App\Tag::class))
                ->setPriority(100)
                ->setIcon('fa fa-tag'),
        ]
    ],
    [
        'title' => 'Покупки(Заказы)',
        'icon'  => 'fa fa-dollar',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Order::class))
                ->setPriority(100)
                ->setIcon('fa fa-dollar'),

        ]
    ],
    [
        'title' => 'Меню',
        'icon'  => 'fa fa-bars',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\FooterMenu::class))
                ->setPriority(100)
                ->setIcon('fa fa-bars'),
        ]
    ],
    [
        'title' => 'Конкурсы',
        'icon'  => 'fa fa-bars',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Competition::class))
                ->setPriority(100)
                ->setIcon('fa fa-bars'),
            (new Page(\App\CompetitionOrder::class))
                ->setPriority(100)
                ->setIcon('fa fa-bars'),
        ]
    ],
    [
        'title' => 'Блоги',
        'icon'  => 'fa fa-book',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Blog::class))
                ->setPriority(100)
                ->setIcon('fa fa-book'),

        ]
    ],
    [
        'title' => 'Баннеры',
        'icon'  => 'fa fa-book',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Banner::class))
                ->setPriority(100)
                ->setIcon('fa fa-book'),

        ]
    ],
    [
        'title' => 'Книги',
        'icon'  => 'fa fa-book',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Book::class))
                ->setPriority(100)
                ->setIcon('fa fa-book'),
            (new Page(\App\Chapter::class))
                ->setPriority(100)
                ->setIcon('fa fa-book'),
        ]
    ],
    [
        'title' => 'Комментарии',
        'icon'  => 'fa fa-user',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Comment::class))
                ->setPriority(100)
                ->setIcon('fa fa-user'),
        ]
    ],
    [
        'title' => 'Страницы сайта',
        'icon'  => 'fa fa-book',
        'pages' => [
            //
            //        \App\User::class,
            //
            //        // or
            //
            (new Page(\App\Page::class))
                ->setPriority(100)
                ->setIcon('fa fa-book'),
        ]
    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];