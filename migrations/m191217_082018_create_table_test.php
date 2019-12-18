<?php

use yii\db\Migration;

/**
 * Class m191217_082018_create_table_test
 */
class m191217_082018_create_table_test extends Migration
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
        echo "m191217_082018_create_table_test cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'description' => $this->string(256)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date_for_pass' => $this->timestamp()->notNull(),
        ], $tableOptions);
        $this->createIndex('name', '{{%test}}', 'name', true);
        $this->createIndex('user_id', '{{%test}}', 'user_id');
        $this->createIndex('date_for_pass', '{{%test}}', 'user_id');
        $this->addForeignKey('user_id_ibfk_1', '{{%test}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%test}}');
    }
}
