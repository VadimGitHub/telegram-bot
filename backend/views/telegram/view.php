<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\telegram\TelegramChanel
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каналы Telegram', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => false,
]) ?>

