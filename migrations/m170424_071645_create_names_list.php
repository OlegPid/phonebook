<?php

use yii\db\Migration;

class m170424_071645_create_names_list extends Migration
{
    public function up()
    {
        $this->createTable('names_list', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('names_list');
    }
}
