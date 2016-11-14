<?php

use yii\db\Migration;

class m161114_081554_add_column_category_position extends Migration
{
    const TBL_CATE = '{{%category}}';
    public function up()
    {
        $this->addColumn(self::TBL_CATE, 'position', $this->integer());
    }

    public function down()
    {
        $this->dropColumn(self::TBL_CATE, 'position');
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
