<?php

use yii\db\Migration;

/**
 * Class m181001_130711_change_tbl_group_vk
 */
class m181001_130711_change_tbl_group_vk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('group_vk', ['type' => \common\models\vk\GroupVk::TYPE_GROUP]);
        $this->alterColumn('group_vk', 'type', $this->integer()->defaultValue(5));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
