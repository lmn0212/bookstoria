<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Comment::class, function (ModelConfiguration $model) {
    $model->setTitle('Комментарии');
    $model->setCreateTitle('Создание комментария');


    // Display
    $model->onDisplay(function () {
         $display =  AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->with('user','book')
            ->setColumns([
                AdminColumn::text('text')->setLabel('Комментарий'),
                AdminColumn::text('user.name')->setLabel('Пользователь'),
                AdminColumn::text('book.name')->setLabel('Книга'),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);

        $display->setColumnFilters([
            AdminColumnFilter::text()->setPlaceholder('Комментарий'), //  ищем по первому столбцу
            // Поиск текста
            AdminColumnFilter::select(new \App\User(), 'name')->setDisplay('name')->setPlaceholder('Автор')->setColumnName('user_id')->setHtmlAttribute('class', 'w200'),
            // Поиск по выпадающему списку значений
            AdminColumnFilter::select(new \App\Book(), 'name')->setDisplay('name')->setPlaceholder('Книга')->setColumnName('book_id')->setHtmlAttribute('class', 'w200'),
            // Поиск по диапазону дат
            null,
        ])->setPlacement('table.header');
        return  $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('text', 'Комментарий')->required(),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Жанр создан');
    $model->setMessageOnUpdate('Жанр обновлен');
    $model->setMessageOnDelete('Жанр удален');
    $model->setMessageOnRestore('Жанр восстановлен');


});