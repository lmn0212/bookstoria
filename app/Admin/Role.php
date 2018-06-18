<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Role::class, function (ModelConfiguration $model) {
    $model->setTitle('Роли пользователей');
    $model->setCreateTitle('Создание роли');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('name')->setLabel('Название роли'),
                AdminColumn::email('created_at')->setLabel('Дата регистрации')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название роли')->required(),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Роль создана');
    $model->setMessageOnUpdate('Роль обновлена');
    $model->setMessageOnDelete('Роль удалена');
    $model->setMessageOnRestore('Роль восстановлена');


});