<?php

/* @var $this yii\web\View */
/* @var $model common\models\user\User */

$this->title = 'Редактирование: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';

echo $this->render('_form', [
    'model' => $model,
    'edit' => true,
]);
