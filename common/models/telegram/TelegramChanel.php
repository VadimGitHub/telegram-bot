<?php

namespace common\models\telegram;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "telegram_chanel".
 *
 * @property int $id
 * @property string $title
 * @property string $chat_id
 */
class TelegramChanel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_chanel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'chat_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название канала',
            'chat_id' => 'ID канала',
        ];
    }

    /**
     * Найти канал по названию
     * @param $name
     * @return TelegramChanel|null
     * @throws NotFoundHttpException
     */
    public function getChanelByName($name)
    {
        $chanel = self::findOne(['title' => $name]);

        if (!$chanel) {
            throw new NotFoundHttpException('Канал с таким названием не найден');
        }

        return $chanel;
    }
}
