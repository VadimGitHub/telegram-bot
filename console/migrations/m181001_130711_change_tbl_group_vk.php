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
        $this->dropColumn('group_vk', 'type');
        $this->addColumn('group_vk', 'type', $this->integer()->defaultValue(5));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('group_vk', 'type');
        $this->addColumn('group_vk', 'type', $this->string());
    }
}
