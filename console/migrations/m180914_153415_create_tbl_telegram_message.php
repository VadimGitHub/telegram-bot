<?php

use yii\db\Migration;

/**
 * Class m180914_153415_create_tbl_telegramm_message
 */
class m180914_153415_create_tbl_telegram_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('telegram_message', [
            'id' => $this->primaryKey(),
            'update_id' => $this->integer(),
            'chat_id' => $this->integer(),
            'message_id' => $this->integer(),
            'user_id' => $this->integer(),
            'date' => $this->integer(),
            'text' => $this->text(),
            'type' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('telegram_message');
    }
}
