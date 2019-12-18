<?php

use yii\db\Migration;

/**
 * Class m191217_082124_create_table_answers
 */
class m191217_082124_create_table_answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191217_082124_create_table_answers cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%answers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'question_id' => $this->integer()->notNull(),
            'isCorrect' => $this->tinyInteger(1)->notNull()->defaultValue('0'),
        ], $tableOptions);
        $this->createIndex('question_id', '{{%answers}}', 'question_id');
        $this->addForeignKey('answers_ibfk_1', '{{%answers}}', 'question_id', '{{%questions}}', 'id', 'CASCADE', 'CASCADE');
    }
    
    public function down()
    {
        $this->dropTable('{{%answers}}');
    }
}
