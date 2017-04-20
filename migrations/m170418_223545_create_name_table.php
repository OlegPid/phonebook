<?php

use yii\db\Migration;

/**
 * Handles the creation of table `name`.
 */
class m170418_223545_create_name_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('name', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->null(),
            'fio' => $this->string()->notNull(),
        ]);
        // creates index for column `city_id`
        $this->createIndex(
            'idx-name-city_id',
            'name',
            'city_id'
        );

        // add foreign key for table `name`
        $this->addForeignKey(
            'fk-name-city_id',
            'name',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `name`
        $this->dropForeignKey(
            'fk-name-city_id',
            'name'
       );

        // drops index for column `city_id`
        $this->dropIndex(
            'idx-name-city_id',
            'name'
        );           
        $this->dropTable('name');
    }
}
