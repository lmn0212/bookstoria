<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Banner::class, function (ModelConfiguration $model) {
    $model->setTitle('Баннеры');
    $model->setCreateTitle('Создание баннера');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('id')->setLabel('ID'),
                AdminColumn::image('image')->setLabel('Баннер'),
                AdminColumn::email('created_at')->setLabel('Дата создания')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::image('image', 'Баннер')->required(),
            AdminFormElement::checkbox('public', 'Опубликован')->setDefaultValue('checked'),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Баннер создан');
    $model->setMessageOnUpdate('Баннер обновлен');
    $model->setMessageOnDelete('Баннер удален');
    $model->setMessageOnRestore('Баннер восстановлен');


});