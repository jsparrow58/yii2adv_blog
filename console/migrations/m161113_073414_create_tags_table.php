<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m161113_073414_create_tags_table extends Migration
{
    const TBL_TAGS = '{{%tags}}';
    const TBL_POST = '{{%post}}';
    const TBL_POST_TAGS = '{{%post_tags}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(self::TBL_TAGS, [
            'id' => $this->primaryKey(),
            'tag_name' => $this->string()->notNull(),
            'post_number' => $this->integer()->unsigned(),
        ]);

        $this->createTable(self::TBL_POST_TAGS, [
            'post_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_post_tags', self::TBL_POST_TAGS, 'post_id', self::TBL_POST, 'id');
        $this->addForeignKey('fk_tags_post', self::TBL_POST_TAGS, 'tag_id', self::TBL_TAGS, 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_tags_post', self::TBL_TAGS);
        $this->dropForeignKey('fk_post_tags', self::TBL_POST);
        $this->dropTable(self::TBL_TAGS);
        $this->dropTable(self::TBL_POST_TAGS);
    }
}
