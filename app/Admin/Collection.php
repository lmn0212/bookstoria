<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Collection::class, function (ModelConfiguration $model) {
    $model->setTitle('Тематические подборки');
    $model->setCreateTitle('Создание жанра');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('name')->setLabel('Название тематической подборки'),
                AdminColumn::text('weight')->setLabel('Вес'),
                AdminColumn::email('created_at')->setLabel('Дата регистрации')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название тематической подборки')->required(),
            AdminFormElement::text('weight', 'Вес')->setDefaultValue(0),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Тематическая подборка создана');
    $model->setMessageOnUpdate('Тематическая подборка обновлена');
    $model->setMessageOnDelete('Тематическая подборка удалена');
    $model->setMessageOnRestore('Тематическая подборка восстановлена');


});