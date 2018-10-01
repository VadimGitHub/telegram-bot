<?php

namespace common\services\vk;

use common\models\vk\PostVk;
use common\models\vk\GroupVk;
use common\forms\vk\PostVkForm;
use yii\base\BaseObject;

/**
 * Class VkService
 * @package common\services
 */
class VkPostService extends BaseObject
{
    /** @var PostVk $post */
    public $post;

    /**
     * VkService constructor.
     * @param PostVk $post
     * @param array $config
     */
    public function __construct(PostVk $post, array $config = [])
    {
        $this->post = $post;
        parent::__construct($config);
    }

    /**
     * Create PostVk
     * @param array $message
     * @param GroupVk|null $group
     * @return bool
     */
    public function create(array $message, GroupVk $group = null)
    {
        /** @var PostVk $model */
        $model = $this->post;
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
