<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Tag::class, function (ModelConfiguration $model) {
    $model->setTitle('Теги');
    $model->setCreateTitle('Создание тега');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('name')->setLabel('Название тега'),
                AdminColumn::text('weight')->setLabel('Вес'),
                AdminColumn::email('created_at')->setLabel('Дата регистрации')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название тега')->required(),
            AdminFormElement::text('weight', 'Вес')->setDefaultValue(0),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Тег создан');
    $model->setMessageOnUpdate('Тег обновлен');
    $model->setMessageOnDelete('Тег удален');
    $model->setMessageOnRestore('Тег восстановлен');


});