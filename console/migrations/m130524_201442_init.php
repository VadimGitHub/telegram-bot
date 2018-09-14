<?php

use yii\db\Migration;

/**
 * Class m130524_201442_init
 */
class m130524_201442_init extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => 'timestamp with time zone NOT NULL DEFAULT NOW()',
            'updated_at' => 'timestamp with time zone NOT NULL DEFAULT NOW()',
        ]);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
