<?php

use kartik\dynagrid\DynaGrid;

/**
 * @var $searchModel \common\models\rbac\AuthItemSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $model \common\models\rbac\AuthItem
 */

$this->title = 'Роли пользователей';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'kartik\grid\SerialColumn', 'order' => DynaGrid::ORDER_FIX_LEFT],
    'name',
    'description',
    [
        'label' => 'Права',
        'format' => 'raw',
        'value' => function ($model) {
            return $model->childrenForView;
        }
    ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'template' => '{update}',
//        'dropdown' => false,
//        'order' => DynaGrid::ORDER_FIX_RIGHT
//    ],
];
?>

<div class="box box-info">
    <div class="box-body">
        <?= DynaGrid::widget([
            'columns' => $columns,
            'storage' => DynaGrid::TYPE_COOKIE,
            'theme' => 'panel-success',
            'gridOptions' => [
                'dataProvider' => $dataProvider,
                'panel' => false,
                'toolbar' => false,
            ],
            'options' => ['id' => 'dynagrid-1'] // a unique identifier is important
        ]); ?>
    </div>
</div>
