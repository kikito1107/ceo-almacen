<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%models_shows}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $clabe
 * @property string $color
 * @property string $type_genero
 * @property string $type_shoes
 * @property string $tipo_suela
 * @property string $tipo_forro
 * @property integer $precio_provedor
 * @property integer $precio_minorista
 * @property integer $precio_mayorista
 * @property integer $cantidad
 * @property string $corrida
 * @property integer $mark_id
 * @property string $update_date
 * @property string $create_date
 */
class ModelsShows extends \yii\db\ActiveRecord
{

    const GENRER_MEN = 1;
    const GENRER_WOMAN = 2;
    const GENRER_BOY = 3;
    const GENRER_CHILD = 4;
    const GENRER_BABY = 5;

    const zapato = 1;
    const zapatilla = 2;
    const sandalia = 3;
    const bota = 4;
    const botin = 5;
    const tenis = 6;

    const pbc = 1;
    const ranil = 2;
    const tr = 3;

    const piel = 1;
    const textil = 2;
    const plastico = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%models_shows}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'clabe', 'color', 'precio_provedor', 'precio_minorista', 'precio_mayorista', 'cantidad', 'mark_id', 'create_date'], 'required'],
            [['precio_provedor', 'precio_minorista', 'precio_mayorista', 'cantidad', 'mark_id'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['name', 'type_genero', 'type_shoes', 'tipo_suela', 'tipo_forro'], 'string', 'max' => 50],
            [['clabe', 'color'], 'string', 'max' => 15],
            [['corrida'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Cliente'),
            'clabe' => Yii::t('app', 'Dirección'),
            'color' => Yii::t('app', 'Color'),
            'type_genero' => Yii::t('app', 'Tipo Genero'),
            'type_shoes' => Yii::t('app', 'Tipo de zapato'),
            'tipo_suela' => Yii::t('app', 'Tipo Suela'),
            'tipo_forro' => Yii::t('app', 'Tipo Forro'),
            'precio_provedor' => Yii::t('app', 'Precio Provedor'),
            'precio_minorista' => Yii::t('app', 'Precio Minorista'),
            'precio_mayorista' => Yii::t('app', 'Precio Mayorista'),
            'cantidad' => Yii::t('app', 'Teléfono'),
            'corrida' => Yii::t('app', 'Corrida'),
            'mark_id' => Yii::t('app', 'Mark ID'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Devuelve un listado de tipo de usuarios
     * @return array
     */
    public static function getUserShoes()
    {
        return [
            self::GENRER_MEN => Yii::t('app', 'Hombre'),
            self::GENRER_WOMAN => Yii::t('app', 'Mujer'),
            self::GENRER_BOY => Yii::t('app', 'Niño'),
            self::GENRER_CHILD => Yii::t('app', 'Niña'),
            self::GENRER_BABY => Yii::t('app', 'Bebe')
        ];
    }

    public static function getTypeShoes()
    {
        return [
            self::zapato => Yii::t('app', 'Zapato'),
            self::zapatilla => Yii::t('app', 'Zapatilla'),
            self::sandalia => Yii::t('app', 'Sandalia'),
            self::bota => Yii::t('app', 'Bota'),
            self::botin => Yii::t('app', 'Botin'),
            self::tenis => Yii::t('app', 'Tenis')
        ];
    }

    public static function getTypeSuela()
    {
        return [
            self::pbc => Yii::t('app', 'PBC'),
            self::ranil => Yii::t('app', 'Ranil'),
            self::tr => Yii::t('app', 'Tr')
        ];
    }

    public static function getTypeForro()
    {
        return [
            self::piel => Yii::t('app', 'Piel'),
            self::textil => Yii::t('app', 'Textil'),
            self::plastico => Yii::t('app', 'Plastico')
        ];
    }
}
