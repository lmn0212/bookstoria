<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\FooterMenu::class, function (ModelConfiguration $model) {
    $model->setTitle('Футер меню');
    $model->setCreateTitle('Создание пункта меню');


    // Display
    $model->onDisplay(function () {
        $display =  AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('name')->setLabel('Название ссылки'),
                AdminColumn::text('link')->setLabel('URL ссылки'),
                AdminColumn::text('public')->setLabel('Опубликовано'),
                AdminColumn::text('type')->setLabel('Тип'),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);

        return  $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название ссылки')->required(),
            AdminFormElement::text('link', 'URL ссылки(/page/Тут айди страницы')->required(),
            AdminFormElement::select('type', 'Тип ссылки(помощь или информация)',['info'=>'Информация','help'=>'Помощь'])->required(),
            AdminFormElement::checkbox('public', 'Опубликовано')->setDefaultValue('checked'),
        ]);
    });

    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Ссылка создана');
    $model->setMessageOnUpdate('Ссылка обновлена');
    $model->setMessageOnDelete('Ссылка удалена');
    $model->setMessageOnRestore('Ссылка восстановлена');


});