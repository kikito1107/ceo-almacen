<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mayorista}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $direccion
 * @property string $rfc
 * @property string $credito
 * @property string $estado
 * @property string $update_date
 * @property string $create_date
 */
class Mayorista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mayorista}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'direccion', 'rfc', 'credito', 'estado', 'create_date'], 'required'],
            [['update_date', 'create_date'], 'safe'],
            [['name', 'direccion'], 'string', 'max' => 50],
            [['rfc', 'credito', 'estado'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'direccion' => Yii::t('app', 'Direccion'),
            'rfc' => Yii::t('app', 'Rfc'),
            'credito' => Yii::t('app', 'Credito'),
            'estado' => Yii::t('app', 'Estado'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }
}
