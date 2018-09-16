<?php

use yii\db\Migration;

/**
 * Class m180916_073824_create_tbl_vk_post
 */
class m180916_073824_create_tbl_vk_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post_vk', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->comment('Группа поста'),
            'post_id' => $this->integer()->comment('ID поста в группе'),
            'from_id' => $this->integer()->comment('Кто опубликовал'),
            'owner_id' => $this->integer()->comment('Где опубликовал'),
            'date' => $this->integer()->comment('Когда опубликовал'),
            'marked_as_ads' => $this->boolean()->defaultValue(false)->comment('Реклама'),
            'text' => $this->text()->comment('Текст поста'),
        ]);

        $this->addForeignKey(
            'FK_post_to_group',
            'post_vk',
            'group_id',
            'group_vk',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post_vk');
    }
}
