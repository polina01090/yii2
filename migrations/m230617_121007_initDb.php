<?php

use yii\db\Migration;

/**
 * Class m230617_121007_initDb
 */
class m230617_121007_initDb extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(120)->notNull(),
        ]);
        $this->createTable('color_dir', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);
        $this->createTable('type_dir', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);
        $this->createTable('flowers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'color_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-flowers-color_id',
            'flowers',
            'color_id',
            'color_dir',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-flowers-type_id',
            'flowers',
            'type_id',
            'type_dir',
            'id',
            'CASCADE',
            'CASCADE',
        );

        $this->createTable('bouquet', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);
        $this->createTable('flowers-to-bouquet', [
            'id' => $this->primaryKey(),
            'flower_id' => $this->integer()->notNull(),
            'bouquet_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-ftb-flower_id',
            'flowers-to-bouquet',
            'flower_id',
            'flowers',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-ftb-bouquet_id',
            'flowers-to-bouquet',
            'bouquet_id',
            'bouquet',
            'id',
            'CASCADE',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('flower-to-bouquet');
        $this->dropTable('bouquet');
        $this->dropTable('flowers');
        $this->dropTable('type_dir');
        $this->dropTable('color_dir');
    }
}
