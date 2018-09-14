<?php

use yii\db\Migration;

/**
 * Class m180829_150013_add_rbac_role
 */
class m180829_150013_add_rbac_role extends Migration
{
    /**
     * @return bool|void
     * @throws Exception
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $admin = $auth->createRole('admin');

        $auth->add($admin);

        $backend = $auth->createPermission('backend');
        $backend->description = 'Просмотр админки';

        $auth->add($backend);

        $auth->addChild($admin,$backend);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
