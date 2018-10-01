<?php

use kartik\dynagrid\DynaGrid;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\vk\GroupVkSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model \common\models\vk\GroupVk
 */

$this->title = 'Группы ВК';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_LEFT],
    [
        'attribute' => 'title',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'screen_name',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'owner_id',
        'vAlign' => 'middle',
    ],
    [
        'attribute' => 'is_closed',
        'header' => 'Тип группы',
        'vAlign' => 'middle',
        'value' => function ($model) {
            return $model->is_closed ? 'Закрытая' : 'Открытая';
        }
    ],
    [
        'attribute' => 'type',
        'vAlign' => 'middle',
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{message} {view} {update} {delete}',
        'headerOptions' => ['width' => '200'],
        'buttons' => [
            'delete' => function ($url) {
                return Html::a(
                    '<span class="btn btn-danger glyphicon glyphicon-trash"></span>',
                    $url);
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
        'filterModel' => $searchModel,
        'panel' => [
            'before' => Html::a('Добавить группу VK', ['create'], ['class' => 'btn btn-success'])
        ],
        'toolbar' => false,
    ],
    'options' => ['id' => 'dynagrid-1']
]); ?>
