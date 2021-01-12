<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m210112_145838_mymigration
 */
class m210112_145838_mymigration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => Schema::TYPE_PK,
            // $this->primaryKey()
            'name' => Schema::TYPE_STRING,
            'category_id' => Schema::TYPE_INTEGER,
            // $this->string(255) // String with 255 characters
            'created_at' => Schema::TYPE_DATE,
            'price' => Schema::TYPE_INTEGER,
            // $this->integer()
            'logo' => Schema::TYPE_STRING
         
        ]);
        
        $this->createTable('product_category', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'parent_category' => Schema::TYPE_INTEGER
        ]);
        
        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'product_category',
            'id',
            'CASCADE'
        );
   
   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //tablo silme islemleri :
        $this->dropTable('product');
        $this->dropTable('product_category');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210104_123401_product cannot be reverted.\n";

        return false;
    }
    */
}

