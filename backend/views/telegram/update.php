<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model common\models\telegram\TelegramChanel
 */

$this->title = 'Редактирование канала: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каналы телеграм', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => true,
]) ?>
