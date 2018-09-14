<?php

use yii\db\Migration;

/**
 * Class m180801_154450_batch_insert_default_user
 */
class m180801_154450_batch_insert_default_user extends Migration
{
    /** @var array  */
    public $user = [
        [
            'admin',
            'AIVCSJKKGgy1i3Y8BmSRCN_Cnb7a3D1S',
            '$2y$13$386snSaCvg8DxqpGWXtVNuESHvXNMYWoJKs0Gd1AP/uGWQEc1Q4vO',
            'admin@base.ru',
            10,
        ]
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('user', ['username', 'auth_key', 'password_hash', 'email', 'status'], $this->user);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }
}
