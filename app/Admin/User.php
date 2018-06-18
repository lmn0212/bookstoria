<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Role;
AdminSection::registerModel(\App\User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи');
    $model->setCreateTitle('Создание пользователей');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->with('roles')
            ->setDisplaySearch(true)
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Login'),
                AdminColumn::link('email')->setLabel('Email'),
                AdminColumn::lists('roles.name')->setLabel('Роль'),
                AdminColumn::email('created_at')->setLabel('Дата регистрации')
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Login')->required(),
            AdminFormElement::text('email', 'Email')->required(),
            AdminFormElement::password('password', 'Password')->required(),
            AdminFormElement::select('roles', 'Роль')->setModelForOptions(new Role())->setDisplay('name'),
        ]);
    });
    // Создание записи
    $model->creating(function($model,$config){
        $config->password = Hash::make($config->password);
    });
    // Редактирование записи
    $model->updating(function ($moddel,$config){
        $config->password = Hash::make($config->password);
    });
    // Удаление записи

    // Восстановление записи

    // Установка сообщений
    $model->setMessageOnCreate('Пользователь создан');
    $model->setMessageOnUpdate('Пользователь обновлен');
    $model->setMessageOnDelete('Пользователь удален');
    $model->setMessageOnRestore('Пользователь восстановлен');


});