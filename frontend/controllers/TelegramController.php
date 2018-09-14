<?php

namespace frontend\controllers;

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

        $result = $updateContent['result'][1];

        $chat = $updateContent['result'][1]['message']['chat']['id'];

        $message = file_get_contents('https://api.telegram.org/bot' . $token . '/sendMessage?chat_id='.$chat.'&text=Hello%20World');

        var_dump($updateContent);
    }
}
