<?php

/**
 * @var $this yii\web\View
 * @var $model common\models\vk\GroupVk
 * @var $modelForm common\forms\vk\GroupVkForm
 */

$this->title = 'Добавить группу Vk';
$this->params['breadcrumbs'][] = ['label' => 'Группы Vk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'modelForm' => $modelForm,
    'edit' => true,
]) ?>
