<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\User;
AdminSection::registerModel(\App\Blog::class, function (ModelConfiguration $model) {
    $model->setTitle('Блоги');
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->with('user')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('id')->setLabel('ID')->setWidth(50),
                AdminColumn::image('cover')->setLabel('Обложка блога'),
                AdminColumn::link('user.name')->setLabel('Имя пользователя')->setWidth(150),
                AdminColumn::text('name')->setLabel('Блог')->setWidth(50),
                AdminColumn::text('public')->setLabel('Опубликовано')->setWidth(50),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название блога')->required(),
            AdminFormElement::image('cover', 'Обложка блога')->required(),
            AdminFormElement::wysiwyg('text', 'Текст блога')->required(),
            AdminFormElement::checkbox('public', 'Опубликовано')->setDefaultValue('checked'),
            AdminFormElement::select('user_id', 'Автор блога')->setModelForOptions(new User())->setDisplay('name')
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Блог создан');
    $model->setMessageOnUpdate('Блог обновлен');
    $model->setMessageOnDelete('Блог удален');
    $model->setMessageOnRestore('Блог восстановлен');


});