<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\vk\GroupVk
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Групы Vk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'edit' => false,
]) ?>
