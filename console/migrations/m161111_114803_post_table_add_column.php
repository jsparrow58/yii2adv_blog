<?php

use yii\db\Migration;

class m161111_114803_post_table_add_column extends Migration
{
    const TBL_POST = '{{%post}}';
    const TBL_USER = '{{%user}}';
    public function up()
    {
        $this->addForeignKey('fk_post_user', self::TBL_POST, 'user_id', self::TBL_USER, 'id');
    }

    public function down()
    {
        echo "m161111_114803_post_table_add_column cannot be reverted.\n";

        return false;
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
