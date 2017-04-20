<?php

use yii\db\Migration;

/**
 * Handles the creation of table `phone`.
 */
class m170418_223546_create_phone_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('phone', [
            'id' => $this->primaryKey(),
            'name_id' => $this->integer()->null(),
            'number' => $this->string()->notNull(),
        ]);
        // creates index for column `name_id`
        $this->createIndex(
            'idx-phone-name_id',
            'phone',
            'name_id'
        );

        // add foreign key for table `phone`
        $this->addForeignKey(
            'fk-phone-name_id',
            'phone',
            'name_id',
            'name',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `phone`
        $this->dropForeignKey(
            'fk-phone-name_id',
            'phone'
       );

        // drops index for column `name_id`
        $this->dropIndex(
            'idx-phone-name_id',
            'phone'
        );    

        $this->dropTable('phone');
    }
}
