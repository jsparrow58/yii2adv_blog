<?php

use yii\db\Migration;

class m161111_055044_user_add_coulmn_isAdmin extends Migration
{
    const TBL_USER = '{{%user}}';
    public function up()
    {
        $this->addColumn(self::TBL_USER, 'isAdmin', $this->smallInteger()->unsigned()->defaultValue(0));
    }

    public function down()
    {
        //echo "m161111_055044_user_add_coulmn_isAdmin cannot be reverted.\n";
        $this->dropColumn(self::TBL_USER, 'isAdmin');
        return null;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
