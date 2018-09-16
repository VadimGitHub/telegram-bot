<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\vk\GroupVk
 */

$this->title = 'Редактирование группы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Группы Вк', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => true,
]) ?>
