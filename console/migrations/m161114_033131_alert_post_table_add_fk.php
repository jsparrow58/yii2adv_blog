<?php

use yii\db\Migration;

class m161114_033131_alert_post_table_add_fk extends Migration
{
    const TBL_POST = '{{%post}}';
    const TBL_CATE = '{{%category}}';

    public function safeUp()
    {
        $this->addColumn(self::TBL_POST, 'cate_id', $this->integer()->notNull());
        $this->addForeignKey('fk_post_category', self::TBL_POST, 'cate_id', self::TBL_CATE, 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_post_category', self::TBL_POST);
        $this->dropColumn(self::TBL_POST, 'cate_id');
    }
}
