<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%models}}".
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
 * @property integer $mark_id
 * @property string $one_Photo
 * @property string $two_Photo
 * @property string $tree_Photo
 * @property string $update_date
 * @property string $create_date
 */
class Models extends \yii\db\ActiveRecord
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
    const valerina = 7;

    const pbc = 1;
    const ranil = 2;
    const tr = 3;

    const piel = 1;
    const textil = 2;
    const plastico = 3;

    /**
     * @var UploadedFile
     */
    public $onePhoto;

    /**
     * @var UploadedFile
     */
    public $twoPhoto;

    /**
     * @var UploadedFile
     */
    public $treePhoto;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%models}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'clabe', 'color', 'precio_provedor', 'precio_minorista', 'precio_mayorista', 'mark_id', 'create_date'], 'required'],
            [['precio_provedor', 'precio_minorista', 'precio_mayorista', 'mark_id'], 'integer'],
            [['update_date', 'create_date'], 'safe'],
            [['name', 'type_genero', 'type_shoes', 'tipo_suela', 'tipo_forro'], 'string', 'max' => 50],
            [['clabe', 'color'], 'string', 'max' => 15],
            [['one_Photo', 'two_Photo', 'tree_Photo'], 'string', 'max' => 100],
            [['onePhoto', 'twoPhoto', 'treePhoto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf, gif, jpeg'],
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
            'clabe' => Yii::t('app', 'Clabe'),
            'color' => Yii::t('app', 'Color'),
            'type_genero' => Yii::t('app', 'Tipo genero'),
            'type_shoes' => Yii::t('app', 'Tipo zapato'),
            'tipo_suela' => Yii::t('app', 'Tipo suela'),
            'tipo_forro' => Yii::t('app', 'Tipo forro'),
            'precio_provedor' => Yii::t('app', 'Precio provedor'),
            'precio_minorista' => Yii::t('app', 'Precio minorista'),
            'precio_mayorista' => Yii::t('app', 'Precio mayorista'),
            'mark_id' => Yii::t('app', 'Proovedor'),
            'one_Photo' => Yii::t('app', 'Foto 1'),
            'two_Photo' => Yii::t('app', 'Foto 2'),
            'tree_Photo' => Yii::t('app', 'Foto 3'),
            'onePhoto' => Yii::t('app', 'Foto 1'),
            'twoPhoto' => Yii::t('app', 'Foto 2'),
            'treePhoto' => Yii::t('app', 'Foto 3'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
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
            self::tenis => Yii::t('app', 'Tenis'),
            self::valerina => Yii::t('app', 'Valerina')
        ];
    }

    public static function getTypeSuela()
    {
        return [
            self::pbc => Yii::t('app', 'PVC'),
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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');
            if ($this->isNewRecord) {
                $this->create_date = $now;
            }else{
                $this->update_date = $now;
            }
            return true;
        }
        return false;
    }

    /**
     * Sube un archivo al servidor
     * @param $image
     * @param $attribute
     */
    public function upload($image, $attribute)
    {
        if(isset($this->{$attribute})) {
            $path = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'uploads/image' . DIRECTORY_SEPARATOR . $this->{$attribute};
            if(file_exists($path)){
                unlink('uploads/image/' . $this->{$attribute});
            }
        }

        $filename = md5(time() . $this->{$image}->baseName) . '.' . $this->{$image}->extension;
        $this->{$image}->saveAs('uploads/image/' . $filename);
        $this->{$attribute} = $filename;
    }
}
