<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\telegram\TelegramChanel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Telegram Chanels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => false,
]) ?>

