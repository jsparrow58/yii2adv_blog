<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m161114_032639_create_category_table extends Migration
{
    const TBL_CATE = '{{%category}}';
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_CATE, [
            'id' => $this->primaryKey(),
            'pid' => $this->integer(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_category_pid_id', self::TBL_CATE, 'pid', self::TBL_CATE, 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL_CATE);
    }
}
