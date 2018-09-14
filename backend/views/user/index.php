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
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'order' => DynaGrid::ORDER_FIX_RIGHT
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
            'before' => Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success'])
        ],
        'toolbar' => false,
    ],
    'options' => ['id' => 'dynagrid-1'] // a unique identifier is important
]); ?>
