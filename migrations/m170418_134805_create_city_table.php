<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m170418_134805_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->null(),
            'name' => $this->string()->notNull(),
        ]);
        // creates index for column `country_id`
        $this->createIndex(
            'idx-city-country_id',
            'city',
            'country_id'
        );

        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-city-country_id',
            'city',
            'country_id',
            'country',
            'id',
            'CASCADE'
        );        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `city`
        $this->dropForeignKey(
            'fk-city-country_id',
            'city'
       );

        // drops index for column `country_id`
        $this->dropIndex(
            'idx-city-country_id',
            'city'
        );
        $this->dropTable('city');
    }
}
