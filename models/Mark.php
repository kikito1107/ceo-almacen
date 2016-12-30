<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mark}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $provider_id
 * @property integer $clabe
 * @property string $update_date
 * @property string $create_date
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mark}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'provider_id', 'clabe'], 'required'],
            [['provider_id', 'clabe'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Marca'),
            'provider_id' => Yii::t('app', 'Proveedor'),
            'clabe' => Yii::t('app', 'Número de referencia'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
        ];
    }

    /**
     * Relación con la tabla de región
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }
}
