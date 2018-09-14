<?php

namespace common\models\telegram;

/**
 * This is the model class for table "telegram_message".
 *
 * @property int $id
 * @property int $update_id
 * @property int $chat_id
 * @property int $user_id
 * @property int $date
 * @property string $text
 * @property string $type
 */
class TelegramMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['update_id', 'chat_id', 'user_id', 'date'], 'default', 'value' => null],
            [['update_id', 'chat_id', 'user_id', 'date'], 'integer'],
            [['text'], 'string'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'update_id' => 'Update ID',
            'chat_id' => 'ID чата',
            'user_id' => 'ID пользователя',
            'date' => 'Дата сообщения',
            'text' => 'Текст сообщения',
            'type' => 'Тип сообщения',
        ];
    }
}
