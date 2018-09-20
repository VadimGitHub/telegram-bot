<?php

$_ENV['YII_PRODUCT_SETTINGS'] = \yii\helpers\Json::decode(file_get_contents(dirname(dirname(__DIR__)) . '/settings.json'));

$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'telegram' => [
            'class' => 'common\components\telegram\TelegramComponent',
        ],
        'vk' => [
            'class' => 'common\components\vk\VkComponent',
        ],
        'telegramQueue' => [
            'class' => \yii\queue\amqp_interop\Queue::class,
            'port' => $_ENV['YII_PRODUCT_SETTINGS']['MQ']['port'],
            'vhost' => $_ENV['YII_PRODUCT_SETTINGS']['MQ']['vhost'],
            'user' => $_ENV['YII_PRODUCT_SETTINGS']['MQ']['user'],
            'password' => $_ENV['YII_PRODUCT_SETTINGS']['MQ']['password'],
            'queueName' => $_ENV['YII_PRODUCT_SETTINGS']['MQ']['telegram'],
            'driver' => yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,
            'exchangeName' => 'send-telegram',
            'dsn' => 'amqp://guest:guest@localhost:5672/%2F',
        ],
    ],
];

return $config;
