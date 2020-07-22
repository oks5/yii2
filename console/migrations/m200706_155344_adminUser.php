<?php

use yii\db\Migration;

/**
 * Class m200706_155344_adminUser
 */
class m200706_155344_adminUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, 3);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_155344_adminUser cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_155344_adminUser cannot be reverted.\n";

        return false;
    }
    */
}
