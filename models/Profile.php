<?php

namespace app\models;

use auth\models\User;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $image_Photo
 * @property string $ine_Photo
 * @property string $request_job_Photo
 * @property string $address_Photo
 * @property string $birth_certificate_Photo
 * @property integer $status
 * @property integer $user_type
 * @property string $update_date
 * @property string $create_date
 * @property string $nss
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * Usuario con permiso de administrador
     */
    const USER_ADMINISTRATOR = 1;

    /**
     * Usuario con permiso de cajero
     */
    const USER_CASHIER = 2;

    /**
     * Usuario con permiso de capturista
     */
    const USER_WRITER = 3;

    /**
     * Usuario vendedor
     */
    const USER_SALESMAN = 4;

    /**
     * Usuario supervisor
     */
    const USER_SUPERVISION = 5;


    /**
     * Estatus inactivo
     */
    const STATUS_INACTIVE = 0;

    /**
     * Estatus activo
     */
    const STATUS_ACTIVE = 1;

    /**
     * @var UploadedFile
     */
    public $imagePhoto;
    /**
     * @var UploadedFile
     */
    public $inePhoto;
    /**
     * @var UploadedFile
     */
    public $request_jobPhoto;
    /**
     * @var UploadedFile
     */
    public $addressPhoto;
    /**
     * @var UploadedFile
     */
    public $birth_certificatePhoto;

    /**
     * @var string $password Contraseña
     */
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'user_type'], 'integer'],
            [['name', 'email', 'address', 'phone', 'image_Photo', 'ine_Photo', 'request_job_Photo', 'address_Photo', 'birth_certificate_Photo', 'user_type', 'nss'], 'required'],
            [['update_date', 'create_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['nss'], 'string', 'max' => 18],
            [['email', 'phone', 'image_Photo', 'ine_Photo', 'request_job_Photo', 'address_Photo', 'birth_certificate_Photo'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 250],
            [['imagePhoto', 'inePhoto', 'request_jobPhoto', 'addressPhoto', 'birth_certificatePhoto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf, gif, jpeg'],
            [['email'], 'unique', 'on' => 'create', 'targetClass' => 'auth\models\User', 'message' => Yii::t('app', 'Este email ya se encuentra registrado')],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Correo electrónico'),
            'address' => Yii::t('app', 'Domicilio'),
            'phone' => Yii::t('app', 'Teléfono'),
            'image_Photo' => Yii::t('app', 'Foto de perfil'),
            'imagePhoto' => Yii::t('app', 'Foto de perfil'),
            'ine_Photo' => Yii::t('app', 'Imagen de la credencial de elector'),
            'inePhoto' => Yii::t('app', 'Imagen de la credencial de elector'),
            'request_job_Photo' => Yii::t('app', 'Imagen de la solicitud de empleo'),
            'request_jobPhoto' => Yii::t('app', 'Imagen de la solicitud de empleo'),
            'address_Photo' => Yii::t('app', 'Imagen de comprabante de domicilio'),
            'addressPhoto' => Yii::t('app', 'Imagen de comprabante de domicilio'),
            'birth_certificate_Photo' => Yii::t('app', 'Acta de naciemiento'),
            'birth_certificatePhoto' => Yii::t('app', 'Acta de naciemiento'),
            'status' => Yii::t('app', 'Status'),
            'user_type' => Yii::t('app', 'Tipo de usuario'),
            'update_date' => Yii::t('app', 'Fecha de actualización'),
            'create_date' => Yii::t('app', 'Fecha de creación'),
            'nss' => Yii::t('app', 'Número de seguro social'),
        ];
    }

    /**
     * Devuelve el tipo de role que le pertenece al usuario
     * @return string
     */
    public function getUserRole()
    {
        switch ($this->user_type) {
            case $this::USER_ADMINISTRATOR:
                $role = "administrator";
                break;
            case $this::USER_CASHIER:
                $role = "cashier";
                break;
            case $this::USER_WRITER:
                $role = "writer";
                break;
            case $this::USER_SALESMAN:
                $role = "salesman";
                break;
            default:
                $role = "guest";
                break;
        }

        return $role;
    }

    /**
     * Genera un usuario
     *
     * Creamos una instancia de
     * @return bool|int
     */
    public function registerUser()
    {
        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $this->password = $this->generatePassword();
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = $this::STATUS_INACTIVE;

        if($user->save()) {

            $auth = Yii::$app->authManager;

            $role = $auth->getRole($this->getUserRole());

            $auth->assign($role, $user->id);

            return $user->id;
        }

        return false;
    }

    /**
     * Genera un password aleatorio
     * @return string
     */
    private function generatePassword()
    {
        $password = substr(md5(microtime()), 1, 8);

        return $password;
    }

    /**
     * Convierte una fecha en formato para guardar en mysql Y-m-d
     * @param $date
     * @return mixed
     */
    public static function convertSqlDate($date)
    {
        $time = strtotime($date);
        $newDate = date('Y-m-d', $time);
        return $newDate;
    }

    /**
     * Devuelve un listado de tipo de usuarios
     * @return array
     */
    public static function getUserType()
    {
        return [
            self::USER_ADMINISTRATOR => Yii::t('app', 'Administrador'),
            self::USER_CASHIER => Yii::t('app', 'Cajero'),
            self::USER_WRITER => Yii::t('app', 'Capturista'),
            self::USER_SUPERVISION => Yii::t('app', 'Supervisor'),
            self::USER_SALESMAN => Yii::t('app', 'Vendedor')
        ];
    }

    /**
     * Relación con la tabla de usuarios
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->name = rtrim($this->name);

        if(parent::beforeSave($insert)){
            $now = date('Y-m-d H:i:s');
            if ($this->isNewRecord) {
                $_userId = $this->registerUser();
                $this->setAttribute('user_id', $_userId);
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
