<?php

use yii\db\Migration;

/**
 * Class m180829_153824_create_tbl_balance
 */
class m180829_153824_create_tbl_balance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('balance', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('ID владельца баланса'),
            'balance' => $this->decimal('12', 2)->comment('Баланс'),
        ]);

        $this->addForeignKey('FK_balnce_to_user', 'balance', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('balance');
    }
}
