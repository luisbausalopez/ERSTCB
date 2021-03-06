<?php

/**
 * This is the model class for table "time_project".
 *
 * The followings are the available columns in table 'time_project':
 * @property integer $id
 * @property string $pnumber
 * @property string $pname
 * @property string $acronym
 * @property string $startdate
 * @property string $enddate
 * @property string $status
 * @property string $description
 *
 * The followings are the available model relations:
 * @property ProjectAccount[] $projectAccounts
 * @property WorkRelation[] $workRelations
 * @property WorkPackage[] $workPackages
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'time_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pnumber, pname, startdate, status', 'required'),
			array('pnumber', 'length', 'max'=>6),
			array('pname', 'length', 'max'=>100),
			array('acronym', 'length', 'max'=>10),
			array('status', 'length', 'max'=>25),
			array('description', 'length', 'max'=>600),
			array('enddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pnumber, pname, acronym, startdate, enddate, status, description', 'safe', 'on'=>'search'),
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
			'projectAccounts' => array(self::HAS_MANY, 'ProjectAccount', 'projectid'),
			'workRelations' => array(self::HAS_MANY, 'WorkRelation', 'projectid'),
			'workPackages' => array(self::HAS_MANY, 'WorkPackage', 'projectid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pnumber' => 'Pnumber',
			'pname' => 'Pname',
			'acronym' => 'Acronym',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'status' => 'Status',
			'description' => 'Description',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pnumber',$this->pnumber,true);
		$criteria->compare('pname',$this->pname,true);
		$criteria->compare('acronym',$this->acronym,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}