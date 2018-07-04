<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Order::class, function (ModelConfiguration $model) {
    $model->setTitle('Покупки книг');
    $model->disableCreating();
    $model->disableDeleting();
    $model->disableEditing();
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->with('user','book')
            ->setDisplaySearch(true)
            ->setColumns([
                AdminColumn::link('id')->setLabel('ID')->setWidth(50),
                AdminColumn::link('user.name')->setLabel('Имя пользователя')->setWidth(150),
                AdminColumn::text('book.name')->setLabel('Книга')->setWidth(50),
                AdminColumn::text('summ')->setLabel('Цена')->setWidth(50),
                AdminColumn::text('currency')->setLabel('Валюта')->setWidth(50),
                AdminColumn::text('payment_id')->setLabel('ID операции'),
                AdminColumn::text('result')->setLabel('Статус'),
                //AdminColumn::text('paytype')->setLabel('Тип платежа'),
                AdminColumn::text('liqpay_order_id')->setLabel('ID Liqpay платежа'),
                AdminColumn::text('description')->setLabel('Описание платежа'),
                AdminColumn::text('ip')->setLabel('ip'),
                AdminColumn::text('created_at')->setLabel('Дата создания')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('summ', 'Цена')->required(),
            AdminFormElement::text('currency', 'Валюта')->required(),
            AdminFormElement::text('currency', 'Валюта')->required(),
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