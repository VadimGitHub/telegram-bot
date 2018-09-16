<?php

use yii\db\Migration;

/**
 * Class m180916_073015_create_tbl_vk_public
 */
class m180916_073015_create_tbl_vk_public extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group_vk', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->comment('Название группы'),
            'screen_name' => $this->string(255)->comment('URL группы'),
            'owner_id' => $this->string(255)->comment('ID группы'),
            'is_closed' => $this->boolean()->defaultValue(false),
            'type' => $this->string(255)->defaultValue('page'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('group_vk');
    }
}
