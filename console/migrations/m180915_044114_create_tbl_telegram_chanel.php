<?php

use yii\db\Migration;

/**
 * Class m180915_044114_create_tbl_telegram_chanel
 */
class m180915_044114_create_tbl_telegram_chanel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('telegram_chanel', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'chat_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('telegram_chanel');
    }
}
