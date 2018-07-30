<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Author::class, function (ModelConfiguration $model) {
    $model->setTitle('Авторы');
    $model->setCreateTitle('Создание автора');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
//            ->with('roles')
            ->setDisplaySearch(true)
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Автор'),
                AdminColumn::link('first_name')->setLabel('First name'),
                AdminColumn::link('last_name')->setLabel('Last name'),
                AdminColumn::text('user.name')->setLabel('Пользователь'),
                AdminColumn::datetime('created_at')->setFormat('d.m.Y')->setLabel('Дата регистрации'),
                AdminColumn::datetime('updated_at')->setFormat('d.m.Y')->setLabel('Дата обновления')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('first_name', 'First name'),
            AdminFormElement::text('last_name', 'Last name'),
            AdminFormElement::selectajax('user_id', 'User')->setModelForOptions(new \App\User())->setDisplay('name'),
        ]);
    });

    // Установка сообщений
    $model->setMessageOnCreate('Автор создан');
    $model->setMessageOnUpdate('Автор обновлен');
    $model->setMessageOnDelete('Автор удален');
    $model->setMessageOnRestore('Автор восстановлен');


});