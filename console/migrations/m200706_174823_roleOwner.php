<?php

use yii\db\Migration;

/**
 * Class m200706_174823_roleOwner
 */
class m200706_174823_roleOwner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('owner'));

        $roleOwner = $auth->getRole('owner');
        $auth->assign($roleOwner, 4);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_174823_roleOwner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_174823_roleOwner cannot be reverted.\n";

        return false;
    }
    */
}
