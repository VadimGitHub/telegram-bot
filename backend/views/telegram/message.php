<?php

/**
 * @var $this yii\web\View
 * @var $formMessage \common\forms\TelegramMessageForm
 * @var $model \common\models\telegram\TelegramChanel
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Отправка сообщения в: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каналы телеграм', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formMessage, 'message')->textarea([
                    'rows' => 5
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
