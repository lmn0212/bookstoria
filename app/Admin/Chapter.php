<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Category;
use App\Collection;
use App\Tag;
AdminSection::registerModel(\App\Chapter::class, function (ModelConfiguration $model) {
    $model->setTitle('Главы');
    $model->setCreateTitle('Создание главы');


    // Display
    $model->onDisplay(function () {
       $display = AdminDisplay::datatablesAsync()
            ->setHtmlAttribute('class', 'table-primary')

            ->with('book','author')
            ->setColumns([
                AdminColumn::text('number')->setLabel('Номер главы'),
                AdminColumn::link('name')->setLabel('Название главы'),
                AdminColumn::text('book.name')->setLabel('Название книги'),
                AdminColumn::text('author.name')->setLabel('Автор'),
            ])->paginate(20);

        $display->setColumnFilters([
            AdminColumnFilter::text()->setPlaceholder('Номер главы'), // Не ищем по первому столбцу
            // Поиск текста
            AdminColumnFilter::text()->setPlaceholder('Название главы'),
            AdminColumnFilter::select(new \App\Book(), 'name')->setDisplay('name')->setPlaceholder('Название книги')->setColumnName('book_id')->setHtmlAttribute('class', 'w200'),
            // Поиск по выпадающему списку значений
            AdminColumnFilter::select(new \App\User(), 'name')->setDisplay('name')->setPlaceholder('Автор')->setColumnName('author_id'),
            // Поиск по диапазону дат
            null,
        ])->setPlacement('table.header');
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::number('number', 'Номер главы')->required(),
            AdminFormElement::text('name', 'Название главы')->required(),
            AdminFormElement::wysiwyg('text', 'Текст главы')->required(),
            AdminFormElement::selectajax('author_id', 'Автор')->setModelForOptions(new \App\User())->setDisplay('name'),
            AdminFormElement::selectajax('book_id', 'Книга')->setModelForOptions(new \App\Book())->setDisplay('name'),
            AdminFormElement::checkbox('public', 'Опубликовано')->setDefaultValue('checked'),
        ]);
    });

    // Удаление записи

    // Восстановление записи


    // Установка сообщений
    $model->setMessageOnCreate('Глава создана');
    $model->setMessageOnUpdate('Глава обновлена');
    $model->setMessageOnDelete('Глава удалена');
    $model->setMessageOnRestore('Глава восстановлена');


});