<?php

namespace common\components\amqp;

use common\forms\TelegramMessageForm;
use common\models\telegram\TelegramChanel;
use common\components\telegram\TelegramComponent;
use yii\base\BaseObject;
use yii\queue\JobInterface;

/**
 * ClassJob отправки сообщений в телеграмм
 * Class SendTelegramJob
 * @package common\components\amqp
 */
class SendTelegramJob extends BaseObject implements JobInterface
{
    /** @var string $chatName */
    public $chatName;

    /**
     * @param \yii\queue\Queue $queue
     */
    public function execute($queue)
    {
        try {
            /** @var TelegramComponent $telegram */
            $telegram = \Yii::$app->telegram;

            $chat = TelegramChanel::getChanelByName($this->chatName);
            $form = new TelegramMessageForm();

            $form->setMessage('Tест воркера');

            $telegram->sendMessage($chat, $form);
        } catch (\Throwable $t) {
            \Yii::error('Error send Telegram');
        }
    }
}
