<?php

/**
 * @var $this yii\web\View
 * @var $modelForm \common\forms\vk\GroupVkForm
 * @var $model common\models\vk\GroupVk
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Групы Vk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'modelForm' => $modelForm,
    'edit' => false,
]) ?>
