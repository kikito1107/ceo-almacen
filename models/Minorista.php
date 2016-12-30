<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%minorista}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $direccion
 * @property string $pedido
 * @property string $importe
 * @property string $update_date
 * @property string $create_date
 */
class Minorista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%minorista}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'direccion', 'pedido', 'importe'], 'required'],
            [['update_date', 'create_date'], 'safe'],
            [['name', 'direccion'], 'string', 'max' => 50],
            [['pedido'], 'string', 'max' => 300],
            [['importe'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Dirección'),
            'pedido' => Yii::t('app', 'Pedido'),
//            'importe' => Yii::t('app', 'Importe de la compra'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }
}
