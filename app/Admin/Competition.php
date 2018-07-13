<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Competition::class, function (ModelConfiguration $model) {
    $model->setTitle('Конкурсы');
    $model->setCreateTitle('Создание конкурса');


    // Display
    $model->onDisplay(function () {
        $display =  AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('name')->setLabel('Название конкурса'),
                AdminColumn::text('description')->setLabel('Описание конкурса'),
                AdminColumn::text('status')->setLabel('Статус'),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);

        return  $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::image('cover', 'Фото конкурса')->required(),
            AdminFormElement::text('name', 'Название конкурса')->required(),
            AdminFormElement::wysiwyg('description', 'Описание конкурса')->required(),
            AdminFormElement::textarea('rules', 'Правила конкурса')->required(),
            AdminFormElement::checkbox('status', 'Статус')->setDefaultValue('checked'),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Конкурс создан');
    $model->setMessageOnUpdate('Конкурс обновлен');
    $model->setMessageOnDelete('Конкурс удален');
    $model->setMessageOnRestore('Конкурс восстановлен');


});