<?php

/**
 * This is the model class for table "ranking".
 *
 * The followings are the available columns in table 'ranking':
 * @property integer $id
 * @property string $nm
 * @property string $val
 * @property integer $rnk
 * @property string $rg
 * @property string $ctr
 * @property string $create_time
 */
class Ranking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ranking the static model class
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
		return 'ranking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id,create_time','default'),
			//array('create_time', 'required'),
			array('rnk,yy,mm,dd', 'numerical', 'integerOnly'=>true),
			array('nm, val', 'length', 'max'=>100),
			array('rg', 'length', 'max'=>45),
			array('ctr', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nm, val, rnk, rg, ctr, create_time,yy,mm,dd', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nm' => 'Nm',
			'val' => 'Val',
			'rnk' => 'Rnk',
			'rg' => 'Rg',
			'ctr' => 'Ctr',
			'create_time' => 'Create Time',
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
		$criteria->compare('nm',$this->nm,true);
		$criteria->compare('val',$this->val,true);
		$criteria->compare('rnk',$this->rnk);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('ctr',$this->ctr,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function create($rnk,$title)
	{
		$date = date('Y-m-d');
		$arr = explode('-', $date);
		$yy = (int)$arr[0];
		$mm = (int)$arr[1];
		$dd = (int)$arr[2];
		$t = (string)$title;
		$target = $this->findByAttributes(array('nm'=>$t,'yy'=>$yy,'mm'=>$mm,'dd'=>$dd));
		if(!isset($target)){
			$target = new Ranking();
			$target->nm = $title;
			$target->rnk = $rnk;
			$target->yy = $yy;
			$target->mm = $mm;
			$target->dd = $dd;
			$rs = $target->validate();
			$ss = $target->save();
		}
	}
	
}