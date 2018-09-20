<?php

namespace console\controllers;

use common\components\amqp\SendTelegramJob;
use common\components\vk\VkComponent;
use yii\console\Controller;
use yii\httpclient\Client;

/**
 * Class ParserController
 * @package console\controllers
 */
class ParserController extends Controller
{
    /**
     * @return bool|mixed.
     */
    public function actionIndex()
    {
        /** @var VkComponent $vk */
        $vk = \Yii::$app->vk;

        /** @var Client $data */
        $data = $vk->method('post', 'wall.get',
            [
                'owner_id' => '-71729358',
                'count' => 5,
                'filter' => 'all',
                'extended' => 1
            ]
        );

        $vk->prepareData($data);
    }

    public function actionQueue()
    {
        \Yii::$app->telegramQueue->push(new SendTelegramJob([
            'chatName' => 'ParsingTakeVkBot'
        ]));
    }
}
