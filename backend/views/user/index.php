<?php

use kartik\dynagrid\DynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\user\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_LEFT],
    'username',
    'email:email',
    'status',
    'created_at',
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{message} {view} {update} {delete}',
        'headerOptions' => ['width' => '200'],
        'buttons' => [
            'delete' => function ($url, $model) {
                return $model->id !== 1 ? Html::a(
                    '<span class="btn btn-danger glyphicon glyphicon-trash"></span>',
                    $url) : '';
            },
            'update' => function ($url) {
                return Html::a(
                    '<span class="btn btn-warning glyphicon glyphicon-pencil"></span>',
                    $url);
            },
            'view' => function ($url) {
                return Html::a(
                    '<span class="btn btn-info glyphicon glyphicon-eye-open"></span>',
                    $url);
            },
        ],
    ],
];
?>


<?= DynaGrid::widget([
    'columns' => $columns,
    'storage' => DynaGrid::TYPE_COOKIE,
    'theme' => 'panel-default',
    'gridOptions' => [
        'dataProvider' => $dataProvider,
        'panel' => [
            'before' => Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success'])
        ],
        'toolbar' => false,
    ],
    'options' => ['id' => 'dynagrid-1'] // a unique identifier is important
]); ?>
