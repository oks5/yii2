<?php

use yii\db\Migration;

/**
 * Class m200706_153326_addRole
 */
class m200706_153326_addRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('admin'));
        $auth->add($auth->createRole('user'));
        $auth->add($auth->createRole('SeoManager'));
        $auth->add($auth->createRole('ContentManager'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_153326_addRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_153326_addRole cannot be reverted.\n";

        return false;
    }
    */
}
