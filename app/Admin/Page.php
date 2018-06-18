<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Page::class, function (ModelConfiguration $model) {
    $model->setTitle('Страницы сайта');
    $model->setCreateTitle('Создание страницы');


    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('id')->setLabel('ID'),
                AdminColumn::link('title')->setLabel('Название cтраницы'),
                AdminColumn::email('created_at')->setLabel('Дата создания')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::wysiwyg('body', 'Текст')->required(),
            AdminFormElement::checkbox('public', 'Опубликовано')->setDefaultValue('checked'),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Страница создана');
    $model->setMessageOnUpdate('Cтраницв обновлена');
    $model->setMessageOnDelete('Cтраницв удалена');
    $model->setMessageOnRestore('Cтраницв восстановлена');


});