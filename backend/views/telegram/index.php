<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\telegram\TelegramChanelSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Телеграм каналы';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_LEFT],
    'title',
    'chat_id',
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{message} {view} {update} {delete}',
        'headerOptions' => ['width' => '200'],
        'buttons' => [
            'delete' => function ($url, $model) {
                return Html::a(
                    '<span class="btn btn-danger glyphicon glyphicon-trash"></span>',
                    $url);
            },
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="btn btn-warning glyphicon glyphicon-pencil"></span>',
                    $url);
            },
            'view' => function ($url, $model) {
                return Html::a(
                    '<span class="btn btn-info glyphicon glyphicon-eye-open"></span>',
                    $url);
            },
            'message' => function ($url, $model) {
                return Html::a(
                    '<span class="btn btn-primary glyphicon glyphicon-envelope"></span>',
                    $url);
            },
        ],
    ],
];
?>

<?= DynaGrid::widget([
    'columns' => $columns,
    'storage' => DynaGrid::TYPE_COOKIE,
    'theme' => 'panel-success',
    'gridOptions' => [
        'dataProvider' => $dataProvider,
        'panel' => [
            'before' => Html::a('Добавить телеграм канал', ['create'], ['class' => 'btn btn-success'])
        ],
        'toolbar' => false,
    ],
    'options' => ['id' => 'dynagrid-1']
]); ?>
