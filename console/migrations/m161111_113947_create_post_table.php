<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m161111_113947_create_post_table extends Migration
{
    const TBL_POST = '{{%post}}';
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_POST, [
            'id'         => $this->primaryKey(),
            'title'      => $this->string()->notnull()->defaultValue(''),
            'label_img'  => $this->string(),
            'content'    => $this->text()->notnull(),
            'summary'    => $this->string()->notnull()->defaultValue(''),
            'user_id'    => $this->integer()->notnull(),
            'status'     => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1、待审核，2、已发布，0、已删除'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
