<?php

use yii\db\Migration;

class m161226_071752_model extends Migration
{
    public function up()
    {
        $this->createTable('{{%models}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'clabe' => $this->string(15)->notNull(),
            'color' => $this->string(15)->notNull(),
            'type_genero' => $this->string(50)->defaultValue(null),
            'type_shoes' => $this->string(50)->defaultValue(null),
            'tipo_suela' => $this->string(50)->defaultValue(null),
            'tipo_forro' => $this->string(50)->defaultValue(null),
            'precio_provedor' => $this->integer(5)->notNull(),
            'precio_minorista' => $this->integer(5)->notNull(),
            'precio_mayorista' => $this->integer(5)->notNull(),
            'mark_id' => $this->integer(1)->notNull(),
            'one_Photo' => $this->string(100)->notNull(),
            'two_Photo' => $this->string(100)->notNull(),
            'tree_Photo' => $this->string(100)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%models_ibfk_1}}' , '{{%models}}' , 'mark_id' , '{{%mark}}' , 'id' );

        $this->createTable('{{%orden_previa}}', [
            'id' => $this->primaryKey(),
            'folio' => $this->string(15)->notNull(),
            'provider_id' => $this->integer(5)->notNull(),
            'cliente' => $this->string(50)->notNull(),
            'dirección' => $this->string(15)->notNull(),
            'type_genero' => $this->string(50)->defaultValue(null),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),
            'finish_date' => $this->dateTime()->notNull(),
            'type_pay' => $this->string(50)->notNull(),
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%orden_previa_ibfk_1}}' , '{{%orden_previa}}' , 'provider_id' , '{{%provider}}' , 'id' );

        $this->createTable('{{%corridas_previas}}', [
            'id' => $this->primaryKey(),
            'orden_previa_id' => $this->integer(5)->notNull(),
            'models' => $this->string(50)->notNull(),
            'corridas' => $this->text()->defaultValue(null),
            'color' => $this->string(50)->notNull(),
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%corridas_previas_ibfk_1}}' , '{{%corridas_previas}}' , 'orden_previa_id' , '{{%orden_previa}}' , 'id' );
    }

    public function down()
    {

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
