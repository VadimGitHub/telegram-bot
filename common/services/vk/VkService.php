<?php

namespace common\services\vk;

use common\forms\vk\PostVkForm;
use common\models\vk\GroupVk;
use common\models\vk\PostVk;

/**
 * Class VkService
 * @package common\services
 */
class VkService
{
    /**
     * @param array $message
     * @param GroupVk|null $group
     * @return bool
     */
    public function create(array $message, GroupVk $group = null)
    {
        $model = new PostVk();
        $form = new PostVkForm();

        $form->setAttributes($message);
        $form->post_id = $message['id'];
        $form->group_id = $group->id;

        $form->validate();
        $model->attributes = $form->attributes;

        try {
            $model->save();
            return true;
        } catch (\Exception $exception) {
            \Yii::error('Ошибка сохранения поста');
            return false;
        }
    }
}
