<?php

namespace common\services\vk;

use common\models\vk\GroupVk;
use yii\base\BaseObject;

/**
 * Class VkGroupService
 * @package common\services\vk
 */
class VkGroupService extends BaseObject
{
    /** @var GroupVk $group */
    public $group;

    /**
     * VkGroupService constructor.
     * @param GroupVk $group
     * @param array $config
     */
    public function __construct(GroupVk $group, array $config = [])
    {
        $this->group = $group;
        parent::__construct($config);
    }

    /**
     * Create GroupVk
     * @param array $attributes
     * @return bool|GroupVk
     */
    public function create(array $attributes)
    {
        /** @var GroupVk $model */
        $model = $this->group;
        $model->setAttributes($attributes);

        try {
            $model->save();
            return $model;
        } catch (\Exception $exception) {
            \Yii::error('Ошибка сохранения группы');
            return false;
        }
    }

    /**
     * Update GroupVk
     * @param array $attributes
     * @return bool|GroupVk
     */
    public function update(array $attributes)
    {
        /** @var GroupVk $model */
        $model = $this->group;
        $model->setAttributes($attributes);

        try {
            $model->save();
            return $model;
        } catch (\Exception $exception) {
            \Yii::error('Ошибка обновления группы');
            return false;
        }
    }
}
