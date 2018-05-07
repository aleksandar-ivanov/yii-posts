<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180507_115827_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string(),
            'content' => $this->text(),
            'created_by' => $this->integer()
        ]);

        $this->addForeignKey('posts_created_by_foreign', 'posts',
            'created_by', 'users', 'id', 'cascade','cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('posts_created_by_foreign', 'posts');

        $this->dropTable('posts');
    }
}
