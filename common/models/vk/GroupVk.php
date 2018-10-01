<?php

namespace common\models\vk;

/**
 * This is the model class for table "group_vk".
 *
 * @property int $id
 * @property string $title Название группы
 * @property string $screen_name URL группы
 * @property string $owner_id ID группы
 * @property bool $is_closed
 * @property string $type
 *
 * @property PostVk[] $postVks
 */
class GroupVk extends \yii\db\ActiveRecord
{
    const
        TYPE_GROUP = 5, // группа
        TYPE_PUBLIC_PAGE = 10, // публичная страница
        TYPE_EVENT = 15; // мероприятие

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_vk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_closed'], 'boolean'],
            [['title', 'screen_name', 'owner_id'], 'string', 'max' => 255],
            [['type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название группы',
            'screen_name' => 'Название в url',
            'owner_id' => 'ID группы',
            'is_closed' => 'Статус',
            'type' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostVks()
    {
        return $this->hasMany(PostVk::class, ['group_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getAllType(): array
    {
        return [
            self::TYPE_GROUP => 'Группа',
            self::TYPE_PUBLIC_PAGE => 'Публичная страница',
            self::TYPE_EVENT => 'Мероприятие',
        ];
    }
}
