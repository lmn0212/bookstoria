<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Category::class, function (ModelConfiguration $model) {
    $model->setTitle('Жанры');
    $model->setCreateTitle('Создание жанра');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('name')->setLabel('Название жанра'),
                AdminColumn::text('weight')->setLabel('Вес'),
                AdminColumn::email('created_at')->setLabel('Дата регистрации')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название жанра')->required(),
            AdminFormElement::text('weight', 'Вес')->setDefaultValue(0),
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