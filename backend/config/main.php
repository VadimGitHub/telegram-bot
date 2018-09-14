<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'id-backend',
    'name' => 'TestProject App',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log'
    ],
    'homeUrl' => '/admin',
    'modules' => [
        'dynagrid'=> [
            'class'=>'\kartik\dynagrid\Module',
        ],
        'gridview'=> [
            'class'=>'\kartik\grid\Module',
        ],
    ],
    'components' => [
        'db' => require(__DIR__.'/db.php'),
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf_backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require (__DIR__.'/routes.php'),
        ],
    ],
    'params' => $params,
//    Примеры
//    'on afterRequest' => function (\yii\base\Event $event) {
//        $sender = $event->sender;
//        if($sender->requestedRoute != 'debug/default/toolbar' && !Yii::$app->request->isAjax) {
//            \yii\helpers\Url::remember($_SERVER['REQUEST_URI'] ?? '', ControllerUrlHelper::PREVIOUS_GLOBAL_URL);
//        }
//    },
//    'on beforeRequest' => function (\yii\base\Event $event) {
//        if(!Yii::$app->user->isGuest) {
//            $user = Yii::$app->user->identity;
//            if($user->language) {
//                Yii::$app->language = $user->language;
//            } else {
//                Yii::$app->language = 'ru-RU';
//            }
//        }
//    },
];

return $config;