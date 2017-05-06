<?php

use yii\db\Migration;

/**
 * Handles adding create_at to table `name`.
 */
class m170506_083513_add_created_at_column_to_name_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        //$this->addColumn('name', 'created_at', $this->dateTime());
        $this->addColumn('name', 'created_at', $this->integer()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('name', 'created_at');
    }
}
