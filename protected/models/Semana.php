<?php

/**
 * This is the model class for table "semana".
 *
 * The followings are the available columns in table 'semana':
 * @property integer $id
 * @property string $cual_semana
 * @property string $institucion
 * @property string $direcccion
 * @property string $actividad
 * @property string $otra_actividad
 * @property string $sector
 * @property string $publico_meta
 * @property string $formato_actividad
 * @property string $descripcion
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property string $informes
 * @property string $url
 * @property string $logo
 * @property string $ruta
 * @property string $formato
 * @property string $peso
 * @property string $cadena
 * @property integer $usuarios_id
 * @property integer $estado_id
 * @property integer $importante
 *
 * The followings are the available model relations:
 * @property Usuarios $usuarios
 */
class Semana extends CActiveRecord
{
	/**
	 *
	 * @var string materiales de los eventos
	 */
	public $material1;
	public $material2;
	public $material3;
	public $material4;
	public $material5;
	public $materiales;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Semana the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'semana';
	}
	//vI*Iu@2$M)TQZ$R^XtjG)ML%
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('institucion, direccion, actividad, publico_meta, sector, formato_actividad, descripcion, fecha_ini, fecha_fin, usuarios_id, estado_id', 'required'),
			array('usuarios_id, estado_id, sector, publico_meta, formato_actividad, importante', 'numerical', 'integerOnly' => true),
			array('institucion, actividad, otra_actividad, publico_meta, sector, formato_actividad, fecha_ini, fecha_fin, logo, url', 'length', 'max' => 255),
			array('direccion, descripcion, informes', 'safe'),
			//set empty values to null
			array('otra_actividad, informes, url, logo, ruta, formato, peso, cadena', 'default', 'setOnEmpty' => true, 'value' => null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(
				'institucion, cual_semana, actividad, otra_actividad, fecha_ini, fehca_fin, estado_id,
						material1, material2, material3, material4, material5',
				'safe', 'on' => 'search'
			),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'materiales' => array(self::HAS_MANY, 'Materiales', 'semana_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'institucion' => 'Institución',
			'direccion' => 'Ubicación / Transmisión',
			'actividad' => 'Actividad',
			'otra_actividad' => 'Otra actividad',
			'sector' => 'Sector',
			'publico_meta' => 'Público meta',
			'formato_actividad' => 'Formato',
			'descripcion' => 'Descripción',
			'fecha_ini' => 'Fecha y hora de inicio',
			'fecha_fin' => 'Fecha y hora de término',
			'logo' => 'Logo de la institución',
			'informes' => 'Contacto',
			'url' => 'Página web personal',
			'usuarios_id' => 'Usuarios',
			'estado_id' => 'Estado',
			'fec_alta' => 'Fecha de creación del evento',
			'fec_act' => 'Fecha de última modificación del evento',
			'importante' => '¿Es un evento importante?',
			//materiales
			'material1' => 'Material 1',
			'material2' => 'Material 2',
			'material3' => 'Material 3',
			'material4' => 'Material 4',
			'material5' => 'Material 5',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;
		$criteria->compare('institucion', $this->institucion, true);
		$criteria->compare('cual_semana', Yii::app()->params->cual_semana, true);
		$criteria->compare('actividad', $this->actividad);
		$criteria->compare('sector', $this->sector);
		$criteria->compare('publico_meta', $this->publico_meta);
		$criteria->compare('formato_actividad', $this->formato_actividad);
		$criteria->compare('fecha_ini', $this->fecha_ini, true);
		$criteria->compare('fecha_fin', $this->fecha_fin, true);
		$criteria->compare('estado_id', $this->estado_id);
		$criteria->order = 'importante DESC, fecha_ini ASC, id ASC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria, 'pagination' => array('pageSize' => 100),
		));
	}

	/**
	 * (non-PHPdoc)
	 * @see CModel::afterValidate()
	 */
	public function afterValidate()
	{
		$valido = true;
		$quitar = array("-", ":", " ");
		$materiales = array();

		if (!empty($this->fecha_ini) && !empty($this->fecha_fin)) {
			/*if (!preg_match("/^".Controller::formatoFecha('aaaa-mm', Yii::app()->params->fecha_inicio)."-[[:digit:]][[:digit:]] [[:digit:]][[:digit:]]:[[:digit:]][[:digit:]]$/",$this->fecha_ini))
			{
				$this->addError('fecha_ini', 'La fecha de inicio es incorrecta, por favor selecciona la fecha en el calendario que se despliega.'.Controller::formatoFecha('aaaa-mm', Yii::app()->params->fecha_inicio));
				$valido = false;
			}

			if (!preg_match("/^".Controller::formatoFecha('aaaa-mm', Yii::app()->params->fecha_termino)."-[[:digit:]][[:digit:]] [[:digit:]][[:digit:]]:[[:digit:]][[:digit:]]$/",$this->fecha_fin))
			{
				$this->addError('fecha_fin', 'La fecha de término es incorrecta, por favor selecciona la fecha en el calendario que se despliega.');
				$valido = false;
			}*/
			$valido = true;

			if ($valido) {
				$fecha_ini = str_replace($quitar, "", $this->fecha_ini);
				$fecha_fin = str_replace($quitar, "", $this->fecha_fin);
				if ($fecha_ini >= $fecha_fin) {
					$this->addError('fecha_fin', 'La fecha de término no puede ser menor o igual que la fecha de inicio del evento');
					$valido = false;
				}
			}
		}

		if ($this->actividad == "0") {
			if (empty($this->otra_actividad)) {
				$this->addError('otra_actividad', 'Si seleccionaste otra actividad, esta no puede ser vacia');
				$valido = false;
			}
		}

		if (!empty($this->url)) {
			if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
				$this->addError('url', 'La URL de referencia no tiene el formato indicado, no olvides el http o https al inicio.');
				$valido = false;
			}
		}

		$archivo = CUploadedFile::getInstance($this, 'logo');
		if (!empty($archivo)) {
			$formato = $archivo->getType();
			if (in_array($formato, $this->tipoLogos())) {
				$peso = $archivo->getSize();
				if ($peso <= 5024684) {
					if ($valido) {
						$path = Yii::getPathOfAlias('webroot') . '/imagenes/usuarios/semana/logos/';
						$url = Yii::app()->request->baseUrl . '/imagenes/usuarios/semana/logos/';
						if (!file_exists($path . $this->usuarios_id))
							mkdir($path . $this->usuarios_id);

						$fecha = date("Y-m-d_H-i-s");
						$identificador = $fecha . '_';
						$this->logo = $archivo->getName();
						$this->formato = $formato;
						$this->peso = $peso;
						$this->cadena = $identificador;
						$this->ruta = $url . $this->usuarios_id . '/' . $identificador . $archivo;
						$archivo->saveAs($path . $this->usuarios_id . '/' . $identificador . $archivo);
					}
				} else {
					$this->addError('logo', 'El logo debe pesar a lo más 5MB');
					$valido = false;
				}
			} else {
				$this->addError('logo', 'El logo solo admite archivos jpg, png y gif');
				$valido = false;
			}
		}

		//validaciones de los materiales
		$mat1 = $this->validaMaterial($this, 'material1');
		$mat2 = $this->validaMaterial($this, 'material2');
		$mat3 = $this->validaMaterial($this, 'material3');
		//$mat4 = $this->validaMaterial($this, 'material4');
		//$mat5 = $this->validaMaterial($this, 'material5');

		if (!$mat1['valido']) {
			$this->addError('material1', 'El Material 1 ' . $mat1['error']);
			$valido = false;
		} else if ($mat1['valido'] && $mat1['con'])
			array_push($materiales, $mat1);

		if (!$mat2['valido']) {
			$this->addError('material2', 'El Material 2 ' . $mat2['error']);
			$valido = false;
		} else if ($mat2['valido'] && $mat2['con'])
			array_push($materiales, $mat2);

		if (!$mat3['valido']) {
			$this->addError('material3', 'El Material 3 ' . $mat3['error']);
			$valido = false;
		} else if ($mat3['valido'] && $mat3['con'])
			array_push($materiales, $mat3);
		/*
		 if (!$mat4['valido'])
		 {
		$this->addError('material4', 'El Material 4 solo admite archivos pdf y jpg');
		$valido = false;
		} else if ($mat4['valido'] && $mat4['con'])
			array_push($materiales, $mat4);

		if (!$mat5['valido'])
		{
		$this->addError('material5', 'El Material 5 solo admite archivos pdf y jpg');
		$valido = false;
		} else if ($mat5['valido'] && $mat5['con'])
			array_push($materiales, $mat5);
		*/
		//final de las validaciones
		if ($valido && $this->isNewRecord) {
			$this->fec_alta = Controller::fechaAlta();
			$this->fec_act = Controller::fechaAlta();
			$this->cual_semana = Yii::app()->params->cual_semana;
		} else {
			$this->fec_act = Controller::fechaAlta();
		}

		$this->materiales = $materiales;

		if ($valido)
			return parent::afterValidate();
		else
			return false;
	}

	private function validaMaterial($mod, $mat)
	{
		$archivo = CUploadedFile::getInstance($mod, $mat);
		if (!empty($archivo)) {
			$formato = $archivo->getType();
			if (in_array($formato, $this->tipoLogos(false))) {
				$peso = $archivo->getSize();
				if ($peso <= 5024684) {
					$path = Yii::getPathOfAlias('webroot') . '/imagenes/usuarios/semana/materiales/';
					$url = Yii::app()->request->baseUrl . '/imagenes/usuarios/semana/materiales/';
					if (!file_exists($path . $mod->usuarios_id))
						mkdir($path . $mod->usuarios_id);

					if ($mod->isNewRecord) {
						$model = new Materiales();
						$model->fec_alta = Controller::fechaAlta();
						$model->fec_act = Controller::fechaAlta();
					} else {
						$anterior = Materiales::model()->findByAttributes(array('semana_id' => $mod->id, 'numero_material' => $mat));

						if (isset($anterior->id)) {
							$model = $anterior;
							$model->fec_act = Controller::fechaAlta();
						} else {
							$model = new Materiales();
							$model->fec_alta = Controller::fechaAlta();
							$model->fec_act = Controller::fechaAlta();
						}
					}

					$fecha = date("Y-m-d_H-i-s");
					$identificador = $fecha . '_';
					$model->nombre = $archivo->getName();
					$model->formato = $formato;
					$model->peso = $peso;
					$model->cadena = $identificador;
					$model->ruta = $url . $mod->usuarios_id . '/' . $identificador . $archivo;
					$model->numero_material = $mat;

					return array('valido' => true, 'con' => true, 'model' => $model, 'path' => $path . $this->usuarios_id . '/' . $identificador . $archivo, 'archivo' => $archivo);
				} else
					return array('valido' => false, 'error' => 'debe pesar a lo más 5MB');
			} else
				return array('valido' => false, 'error' => 'solo admite archivos pdf y jpg');
		}
		return array('valido' => true, 'con' => false);
	}

	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::afterSave()
	 */
	public function afterSave()
	{
		if (!empty($this->materiales)) {
			foreach ($this->materiales as $k => $material) {
				$model = $material['model'];
				$model->semana_id = $this->id;

				if ($model->save(false))
					$material['archivo']->saveAs($material['path']);
				else {
					$this->addError('material1', 'Lo sentimos, alguno de los materiales no pudo ser guardado');
					return false;
				}
			}
		}
		return parent::afterSave();
	}

	public function beforeDelete()
	{
		Materiales::model()->deleteAllByAttributes(array('semana_id' => $this->id));
		return parent::beforeDelete();
	}

	public static function actividades($posicion = 1000)
	{
		$actividades = array(
			'0' => 'Otra',
			'1' => 'Recorridos',
			'2' => 'Conferencia / Plática',
			'3' => 'Exposición fotográfica',
			'4' => 'Entrevista',
			'5' => 'Concierto',
			'6' => 'Curso / Taller',
			'7' => 'Proyección',
			'8' => 'Foro',
			'9' => 'Puertas abiertas',
			'10' => 'Difusión en medios de comunicación',
			'11' => 'Limpieza',
			'12' => 'Observación de aves',
			'13' => 'Conversatorio',
			'14' => 'Presentación de libro',
			'15' => 'Reforestación',
			'16' => 'Restauración',
			'17' => 'Reunión',
			'18' => 'Visita guiada',
		);
		asort($actividades);
		return $posicion == 1000 ? $actividades : $actividades[$posicion];
	}

	public static function publico_meta($posicion = 0)
	{
		$publico_meta = array(
			// '1' => 'Educación Básica Preescolar',
			// '2' => 'Educación Básica Primaria',
			'3' => 'Educación Básica',
			// '4' => 'Educación Continua',
			// '5' => 'Educación Especial',
			'6' => 'Educación Media Superior',
			'7' => 'Educación Superior',
			// '8' => 'Escuela Normal',
			'9' => 'Público General',
			// '10' => 'Universidad intercultural',
			// '11' => 'CONAFE',
		);

		asort($publico_meta);

		if ($posicion > 0)
			return $publico_meta[$posicion];

		return $publico_meta;
	}

	public static function sector($posicion = 0)
	{
		$sector = array(
			'1' => 'Academia',
			'2' => 'Empresa',
			'3' => 'Gobierno municipal',
			'4' => 'Gobierno estatal',
			'5' => 'Gobierno federal',
			'6' => 'Sociedad Civil',
		);

		asort($sector);

		if ($posicion > 0)
			return $sector[$posicion];

		return $sector;
	}

	public static function formato_actividad($posicion = 0)
	{
		$formato = array(
			'1' => 'Presencial',
			'2' => 'Virtual',
			'3' => 'Híbrido',
		);

		asort($formato);

		if ($posicion > 0)
			return $formato[$posicion];

		return $formato;
	}

	private function tipoLogos($logo = true)
	{
		if ($logo)
			return array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
		else
			return array('image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'application/pdf');
	}
}
