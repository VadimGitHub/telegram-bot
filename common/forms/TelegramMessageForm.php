<?php

namespace common\forms;

use yii\base\Model;

/**
 * Class TelegramMessageForm
 * @package common\forms
 */
class TelegramMessageForm extends Model
{
    /** @var string */
    public $message;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['message', 'filter', 'filter' => 'trim'],
            ['message', 'filter', 'filter' => 'strip_tags'],
            ['message', 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'message' => 'Сообщение',
        ];
    }
}
