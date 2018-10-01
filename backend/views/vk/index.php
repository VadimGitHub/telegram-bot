<?php

use common\models\vk\GroupVk;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
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
        'format' => 'raw',
        'vAlign' => 'middle',
        'filter' => [
            0 => 'Открытая',
            1 => 'Закрытая',
        ],
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '150px'
            ],
        ],
        'filterInputOptions' => [
            'placeholder' => '---'
        ],
        'value' => function (GroupVk $model) {
            return $model->is_closed
                ? '<span class="text-danger">Закрытая</span>'
                : '<span class="text-success">Открытая</span>';
        }
    ],
    [
        'attribute' => 'type',
        'vAlign' => 'middle',
        'filter' => GroupVk::getAllType(),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '150px'
            ],
        ],
        'filterInputOptions' => [
            'placeholder' => '---'
        ],
        'value' => function (GroupVk $model) {
            return GroupVk::getAllType()[$model->type];
        },
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
