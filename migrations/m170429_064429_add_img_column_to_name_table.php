<?php

use yii\db\Migration;

/**
 * Handles adding img to table `name`.
 */
class m170429_064429_add_img_column_to_name_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('name', 'img', $this->string()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('name', 'img');
    }
}
