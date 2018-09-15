<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model common\models\telegram\TelegramChanel
 * @var $form yii\widgets\ActiveForm
 * @var $edit boolean
 */
?>

<div class="box box-info">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'title')->textInput([
                    'maxlength' => true,
                    'disabled' => !$edit,
                ]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'chat_id')->textInput([
                    'maxlength' => true,
                    'disabled' => !$edit,
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <?php if ($edit): ?>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?php else: ?>
                <?= Html::a('Редактировать', Url::to(['/telegram/update', 'id' => $model->id]), [
                    'class' => 'btn btn-info'
                ]) ?>
            <?php endif; ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
