<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\CompetitionOrder::class, function (ModelConfiguration $model) {
    $model->setTitle('Заявки на Конкурсы');
    $model->setCreateTitle('Создание конкурса');
    $model->disableCreating();
    $model->disableDeleting();
    $model->disableEditing();

    // Display
    $model->onDisplay(function () {
        $display =  AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->with('users','books')
            ->setColumns([
                AdminColumn::text('users.name')->setLabel('Имя пользователя'),
                AdminColumn::text('books.name')->setLabel('Название книги'),
                AdminColumn::text('competitions.name')->setLabel('Название конкурса'),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);

        return  $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::image('cover', 'Фото конкурса')->required(),
            AdminFormElement::text('name', 'Название конкурса')->required(),
            AdminFormElement::textarea('description', 'Описание конкурса')->required(),
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