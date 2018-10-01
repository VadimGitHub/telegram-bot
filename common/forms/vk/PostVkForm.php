<?php

namespace common\forms\vk;

use yii\base\Model;

/**
 * Class VkMessageForms
 * @package common\forms\vk
 */
class PostVkForm extends Model
{
    /** @var integer $group_id */
    public $group_id;

    /** @var integer $post_id */
    public $post_id;

    /** @var integer $from_id */
    public $from_id;

    /** @var integer $owner_id */
    public $owner_id;

    /** @var integer $date */
    public $date;

    /** @var boolean $marked_as_ads */
    public $marked_as_ads;

    /** @var string $text */
    public $text;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_id', 'owner_id', 'date'], 'integer'],
            [['marked_as_ads'], 'boolean'],
            [['post_id', 'text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'ID группы',
            'post_id' => 'ID поста',
            'from_id' => 'Кто опубликовал',
            'owner_id' => 'Где опубликовал',
            'date' => 'Дата',
            'marked_as_ads' => 'Реклама',
            'text' => 'Текст',
        ];
    }
}
