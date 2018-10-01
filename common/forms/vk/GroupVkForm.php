<?php

namespace common\forms\vk;

use yii\base\Model;

/**
 * Class GroupVkForm
 * @package common\forms\vk
 */
class GroupVkForm extends Model
{
    /** @var string */
    public $title;

    /** @var string */
    public $screen_name;

    /** @var integer */
    public $owner_id;

    /** @var boolean */
    public $is_closed;

    /** @var string */
    public $type;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'screen_name', 'type'], 'filter', 'filter' => 'trim'],
            [['title', 'screen_name', 'type'], 'filter', 'filter' => 'strip_tags'],
            [['title', 'screen_name', 'type'], 'string'],
            [['owner_id'], 'integer'],
            ['is_closed', 'boolean'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'screen_name' => 'Псевдоним в URL',
            'owner_id' => 'ID группы DR',
            'is_closed' => 'Закрытая/открытая',
            'type' => 'Тип группы',
        ];
    }
}
