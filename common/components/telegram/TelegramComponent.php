<?php

namespace common\components\telegram;

use common\forms\TelegramMessageForm;
use common\models\telegram\TelegramChanel;
use yii\base\Component;

/**
 * Class TelegramComponent
 * @package common\components\telegram
 */
class TelegramComponent extends Component
{
//    Типы команд
    const COMMAND_START = '/start';

//    Типы сообщений
    const
        TYPE_CHANNEL_POST = 'channel_post',
        TYPE_MESSAGE = 'message';

    /**
     * @param TelegramChanel $model
     * @param TelegramMessageForm $form
     * @return bool
     */
    public function sendMessage(TelegramChanel $model, TelegramMessageForm $form) : bool
    {
        $token = $_ENV['YII_PRODUCT_SETTINGS']['telegram']['token'];
        $chat_id = $model->chat_id;
        $message = $form->message;

        $message = file_get_contents('https://api.telegram.org/bot' . $token . '/sendMessage?chat_id='.$chat_id.'&text='. $message);

//        Проверку статуса вынести в отдельную функцию
        $content = json_decode($message, true);

        if ($content['ok']) {
            return true;
        }

        return false;
    }

    /**
     * Обрабатываем сообщения которые поступили
     * @param $updateContent
     */
    public function logMessage($updateContent)
    {

    }
}
