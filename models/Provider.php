<?php

namespace app\models;

use messaging\shared\helpers\Dates;
use Yii;

/**
 * This is the model class for table "{{%provider}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property string $phone
 * @property string $rfc
 * @property string $acount
 * @property string $type_shoes
 * @property integer $status
 * @property integer $clabe
 * @property string $update_date
 * @property string $create_date
 * @property string $acount_name
 */
class Provider extends \yii\db\ActiveRecord
{

    const enabled = 1;

    const disabled = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%provider}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'clabe', 'phone'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['name', 'type_shoes', 'agent_name', 'agent_phone', 'agent_mail', 'acount_name', 'descuento', 'bank'], 'string', 'max' => 50],
            [['descuento', 'descuento_dos'], 'string', 'max' => 2],
            [['location'], 'string', 'max' => 200],
            [['rfc', 'interbank_clabe'], 'string', 'max' => 18],
            [['acount'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nombre de la empreza'),
            'location' => Yii::t('app', 'Dirección'),
            'phone' => Yii::t('app', 'Teléfono'),
            'descuento' => Yii::t('app', 'Descuentos en %'),
            'descuento_dos' => Yii::t('app', ''),
            'rfc' => Yii::t('app', 'RFC'),
            'acount_name' => Yii::t('app', 'Razón social o nombre de la cuenta'),
            'acount' => Yii::t('app', 'Número de cuenta'),
            'interbank_clabe' => Yii::t('app', 'Clabe interbancaria'),
            'bank' => Yii::t('app', 'Banco'),
            'type_shoes' => Yii::t('app', 'Tipo de zapatos'),
            'status' => Yii::t('app', 'Estado cuenta'),
            'clabe' => Yii::t('app', 'Clabe de proveedor'),
            'agent_name' => Yii::t('app', 'Agente de ventas'),
            'agent_phone' => Yii::t('app', 'Teléfono del agente de ventas'),
            'agent_mail' => Yii::t('app', 'Correo del agente de ventas'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->name = rtrim($this->name);
        $this->rfc = trim($this->rfc);
        $this->clabe = trim($this->clabe);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');
//            $date = Dates::convertSqlDate($this->birthday);
//            $this->birthday = $date;

            if ($this->isNewRecord) {
                $this->create_date = $now;
                $this->status = 1;
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }
}
