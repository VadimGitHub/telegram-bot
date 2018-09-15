<?php

namespace frontend\controllers;

use common\components\telegram\TelegramComponent;
use yii\web\Controller;

/**
 * Class TelegramController
 * @package frontend\controllers
 */
class TelegramController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $token = $_ENV['YII_PRODUCT_SETTINGS']['telegram']['token'];

        $update = file_get_contents('https://api.telegram.org/bot' . $token . '/getUpdates');

        $updateContent = json_decode($update, true);

        /** @var TelegramComponent $telegram */
        $telegram = \Yii::$app->telegram;

        $telegram->logMessage($updateContent);

        $result = $updateContent['result'][1];
        $chat = $updateContent['result'][1]['message']['chat']['id'];

        $chat = '-1001382905743';

        $message = file_get_contents('https://api.telegram.org/bot' . $token . '/sendMessage?chat_id='.$chat.'&text=Hello%20World');

        var_dump($updateContent);
    }
}
