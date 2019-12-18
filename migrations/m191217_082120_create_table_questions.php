<?php

use yii\db\Migration;

/**
 * Class m191217_082120_create_table_questions
 */
class m191217_082120_create_table_questions extends Migration
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
        echo "m191217_082120_create_table_questions cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'test_id' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('test_id', '{{%questions}}', 'test_id');
        $this->addForeignKey('questions_ibfk_1', '{{%questions}}', 'test_id', '{{%test}}', 'id', 'CASCADE', 'CASCADE');
    }
    
    public function down()
    {
        $this->dropTable('{{%questions}}');
    }
}
