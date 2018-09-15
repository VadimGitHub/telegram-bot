<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\telegram\TelegramChanel
 */

$this->title = 'Создать телеграм канал';
$this->params['breadcrumbs'][] = ['label' => 'Каналы телеграм', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => true,
]) ?>
