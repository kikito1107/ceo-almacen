<?php

use yii\db\Migration;

class m160420_183802_profile extends Migration
{
    public function up()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->defaultValue(null),
            'name' => $this->string(50)->notNull(),
            'email' => $this->string(100)->notNull(),
            'address' => $this->string(250)->notNull(),
            'phone' => $this->string(100)->notNull(),
            'image_Photo' => $this->string(100)->notNull(),
            'ine_Photo' => $this->string(100)->notNull(),
            'request_job_Photo' => $this->string(100)->notNull(),
            'address_Photo' => $this->string(100)->notNull(),
            'birth_certificate_Photo' => $this->string(100)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'user_type' => $this->integer(1)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull(),
            'nss' => $this->string(50)->notNull(),
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->addForeignKey('{{%profile_ibfk_1}}' , '{{%profile}}' , 'user_id' , '{{%user}}' , 'id' );

        $this->createTable('{{%provider}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'location' => $this->string(100)->defaultValue(null),
            'phone' => $this->string(100)->notNull(),
            'rfc' => $this->string(18)->notNull(),
            'acount' => $this->string(20)->notNull(),
            'interbank_clabe' => $this->string(20)->notNull(),
            'type_shoes' => $this->string(50)->defaultValue(null),
            'status' => $this->integer(1)->notNull(),
            'clabe' => $this->integer(5)->notNull(),
            'agent_name' => $this->string(50)->notNull(),
            'agent_phone' => $this->string(50)->notNull(),
            'agent_mail' => $this->string(50)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->createTable('{{%mark}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'provider_id' => $this->integer(1)->notNull(),
            'clabe' => $this->integer(5)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');


//        $this->createTable('{{%models_shows}}', [
//            'id' => $this->primaryKey(),
//            'name' => $this->string(50)->notNull(),
//            'clabe' => $this->string(15)->notNull(),
//            'color' => $this->string(15)->notNull(),
//            'type_genero' => $this->string(50)->defaultValue(null),
//            'type_shoes' => $this->string(50)->defaultValue(null),
//            'tipo_suela' => $this->string(50)->defaultValue(null),
//            'tipo_forro' => $this->string(50)->defaultValue(null),
//            'precio_provedor' => $this->integer(5)->notNull(),
//            'precio_minorista' => $this->integer(5)->notNull(),
//            'precio_mayorista' => $this->integer(5)->notNull(),
//            'cantidad' => $this->integer(5)->notNull(),
//            'corrida' => $this->string(300)->defaultValue(null),
//            'mark_id' => $this->integer(1)->notNull(),
//            'update_date' => $this->dateTime()->defaultValue(null),
//            'create_date' => $this->dateTime()->notNull()
//        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');
//        $this->addForeignKey('{{%mark_ibfk_1}}' , '{{%mark}}' , 'provider_id' , '{{%provider}}' , 'id' );

//        $this->addForeignKey('{{%models_shoes_ibfk_1}}' , '{{%models_shows}}' , 'mark_id' , '{{%mark}}' , 'id' );

        $this->createTable('{{%mayorista}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'direccion' => $this->string(50)->notNull(),
            'rfc' => $this->string(18)->notNull(),
            'credito' => $this->string(18)->notNull(),
            'estado' => $this->string(18)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

        $this->createTable('{{%minorista}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'direccion' => $this->string(50)->notNull(),
            'pedido' => $this->string(300)->notNull(),
            'importe' => $this->string(18)->notNull(),
            //'estado' => $this->string(18)->notNull(),
            'update_date' => $this->dateTime()->defaultValue(null),
            'create_date' => $this->dateTime()->notNull()
        ], 'ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1');

    }

    public function down()
    {
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%provider}}');
        $this->dropTable('{{%mark}}');
//        $this->dropTable('{{%models_shows}}');
        $this->dropTable('{{%mayorista}}');
        $this->dropTable('{{%minorista}}');
    }
}
