<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\vk\GroupVk
 */

$this->title = 'Добавить группу Vk';
$this->params['breadcrumbs'][] = ['label' => 'Группы Vk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => true,
]) ?>
