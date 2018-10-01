<?php

use common\models\vk\GroupVk;
use kartik\switchinput\SwitchInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model common\models\vk\GroupVk
 * @var $form yii\widgets\ActiveForm
 * @var $modelForm common\forms\vk\GroupVkForm
 * @var $edit boolean
 */
?>

<div class="box box-info">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($modelForm, 'title')->textInput([
                    'maxlength' => true,
                    'disabled' => !$edit,
                ]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($modelForm, 'screen_name')->textInput([
                    'maxlength' => true,
                    'disabled' => !$edit,
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($modelForm, 'owner_id')->textInput([
                    'maxlength' => true,
                    'disabled' => !$edit,
                ]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($modelForm, 'type')->dropDownList(GroupVk::getAllType(), [
                    'prompt' => 'Выберите тип группы',
                    'maxlength' => true,
                    'disabled' => !$edit
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($modelForm, 'is_closed')->widget(SwitchInput::class, [
                    'type' => SwitchInput::CHECKBOX,
                    'pluginOptions' => [
                        'onText' => 'Закрытая группа',
                        'offText' => 'Открытая группа',
                    ],
                    'disabled' => !$edit
                ]); ?>


            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <?php if ($edit): ?>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?php else: ?>
                <?= Html::a('Редактировать', Url::to(['/vk/update', 'id' => $model->id]), [
                    'class' => 'btn btn-info'
                ]) ?>
            <?php endif; ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
