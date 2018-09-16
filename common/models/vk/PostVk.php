<?php

namespace common\models\vk;

/**
 * This is the model class for table "post_vk".
 *
 * @property int $id
 * @property int $group_id Группа поста
 * @property int $post_id ID поста в группе
 * @property int $from_id Кто опубликовал
 * @property int $owner_id Где опубликовал
 * @property int $date Когда опубликовал
 * @property bool $marked_as_ads Реклама
 * @property string $text Текст поста
 *
 * @property GroupVk $group
 */
class PostVk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_vk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'post_id', 'from_id', 'owner_id', 'date'], 'default', 'value' => null],
            [['group_id', 'post_id', 'from_id', 'owner_id', 'date'], 'integer'],
            [['marked_as_ads'], 'boolean'],
            [['text'], 'string'],
            [
                ['group_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => GroupVk::class,
                'targetAttribute' => ['group_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'ID группы',
            'post_id' => 'ID поста',
            'from_id' => 'Кто опубликовал',
            'owner_id' => 'Где опубликовал',
            'date' => 'Дата',
            'marked_as_ads' => 'Реклама',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(GroupVk::class, ['id' => 'group_id']);
    }
}
