<?php
class CommonFunction extends CApplicationComponent{

	public function saveAtLocal($new){
		$validation = $new->validate();
		if(!$validation){
			return false;
		}
		$an8 = $new->SZAN8;
		if(!isset($new->id_user)){
			$new->id_user = Yii::app()->user->name;
		}
		//F0101Z2
		$new->SZEDUS = EXMASTER;
		$new->SZEDBT = PRTN;
		$new->SZATE = 'N';
		$new->SZUSER = EXMASTER;
		$new->SZPID = '201';
		$new->SZJOBN = DataSpider;
		$new->SZTAXC = '2';
		$new->SZATR = "N";
		$new->SZATP = "N";
		$t = F0101::model()->findByAttributes(array('ABAN8'=>$an8));
		$new->SZTNAC = "A";
		if(isset($t)){
			$new->SZTNAC = "C";
			$new->SZALKY = $new->SZAN8;
		}
		if($new->SZTNAC == "A"){
			if($new->SZAN81 == $an8){
				$new->SZAN81 = 0;
			}
			if($new->SZAN82 == $an8){
				$new->SZAN82 = 0;
			}
			if($new->SZAN83 == $an8){
				$new->SZAN83 = 0;
			}
			if($new->SZAN84 == $an8){
				$new->SZAN84 = 0;
			}
			if($new->SZAN85 == $an8){
				$new->SZAN85 = 0;
			}
			if($new->SZAN86 == $an8){
				$new->SZAN86 = 0;
			}
		}
		switch(trim($new->SZAT1)){
			case "C":
				$new->SZATR = "Y";
				break;
			case "V":
				$new->SZATP = "Y";
				break;
			case "CV":
				$new->SZATR = "Y";
				$new->SZATP = "Y";
				break;
		}
		if(trim($new->SZAC27) == 'G'){
			$new->SZMCU = str_pad(GAME_DEP, 12, " ", STR_PAD_LEFT);
		}else{
			$new->SZMCU = str_pad(Z1, 12, " ", STR_PAD_LEFT);
		}

		//F0111Z1
		$new->mf0111z1->BWMLN1 = $new->SZMLN1;
		$new->mf0111z1->BWALP1 = $new->SZALP1;
		$new->mf0111z1->BWEDUS = $new->SZEDUS;
		$new->mf0111z1->BWEDBT = $new->SZEDBT;
		$t = F0111::model()->findByAttributes(array('WWAN8'=>$an8));
		$new->mf0111z1->BWTNAC = isset($t)?"C":"A";
		$new->mf0111z1->BWMLNM = $this->replaceToZenkakuSpace($new->mf0111z1->BWMLNM);
		$new->mf0111z1->BWATTL = $this->replaceToZenkakuSpace($new->mf0111z1->BWATTL);
		$new->mf0111z1->BWREM1 = $this->replaceToZenkakuSpace($new->mf0111z1->BWREM1);
		$new->mf0111z1->BWSLNM = $this->replaceToZenkakuSpace($new->mf0111z1->BWSLNM);
		$new->mf0111z1->BWALPH = $new->SZALPH;
		$new->mf0111z1->BWGNNM = $this->replaceToZenkakuSpace($new->mf0111z1->BWGNNM);
		$new->mf0111z1->BWMLN1 = $new->SZMLN1;
		$new->mf0111z1->BWALP1 = $new->SZALP1;
		$new->mf0111z1->BWUSER = $new->SZUSER;
		$new->mf0111z1->BWPID = "201";
		$new->mf0111z1->BWJOBN = $new->SZJOBN;
		//F0115Z1
		$new->mf0115TEL->PIEDUS = $new->SZEDUS;
		$new->mf0115FAX->PIEDUS = $new->SZEDUS;
		$new->mf0115TEL2->PIEDUS = $new->SZEDUS;
		$new->mf0115TEL->PIEDBT = $new->SZEDBT;
		$new->mf0115FAX->PIEDBT = $new->SZEDBT;
		$new->mf0115TEL2->PIEDBT = $new->SZEDBT;
		$new->mf0115TEL->PIPHTP = "TEL";
		$new->mf0115FAX->PIPHTP = "FAX";
		$new->mf0115TEL2->PIPHTP = "TEL2";
		$new->mf0115TEL->PIUSER = $new->SZUSER;
		$new->mf0115FAX->PIUSER = $new->SZUSER;
		$new->mf0115TEL2->PIUSER = $new->SZUSER;
		$new->mf0115TEL->PITNAC = $this->checkTEL($new->mf0115TEL, "TEL");
		$new->mf0115FAX->PITNAC = $this->checkTEL($new->mf0115TEL, "FAX");
		$new->mf0115TEL2->PITNAC = $this->checkTEL($new->mf0115TEL, "TEL2");
		$new->mf0115TEL->PIPID = "201";
		$new->mf0115FAX->PIPID = "201";
		$new->mf0115TEL2->PIPID = "201";
		$new->mf0115TEL->PIJOBN = $new->SZJOBN;
		$new->mf0115FAX->PIJOBN = $new->SZJOBN;
		$new->mf0115TEL2->PIJOBN = $new->SZJOBN;

		//F01151Z1
		$new->mf01151z1->EBEDUS = $new->SZEDUS;
		$new->mf01151z1->EBEDBT = $new->SZEDBT;
		$new->mf01151z1->EBTNAC = "A";
		if($new->SZTNAC == "C"){
			$new->mf01151z1->EBTNAC = $this->checkEMAIL($new->mf01151z1);
		}
		$new->mf01151z1->EBRCK7 = "1";
		$new->mf01151z1->EBETP = "E";
		$new->mf01151z1->EBUSER = $new->SZUSER;
		$new->mf01151z1->EBPID = "201";
		$new->mf01151z1->EBJOBN = $new->SZJOBN;
		//F01161Z1
		$new->mf01161z1->LBEDUS = $new->SZEDUS;
		$new->mf01161z1->LBEDBT = $new->SZEDBT;
		$t = F01161::model()->findByAttributes(array("WLAN8"=>$an8));
		$new->mf01161z1->LBTNAC = isset($t)?"C":"A";
		$new->mf01161z1->LBADD1 = $new->SZADD1;
		$new->mf01161z1->LBADD2 = $new->SZADD2;
		$new->mf01161z1->LBADD3 = $new->SZADD3;
		$new->mf01161z1->LBADDZ = $new->SZADDZ;
		$new->mf01161z1->LBUSER = $new->SZUSER;
		//F03012Z1 更新が2件
		$new->mf03012z1->VOEDUS = $new->SZEDUS;
		$new->mf03012z1->VOEDBT = $new->SZEDBT;
		$t = F03012::model()->findByAttributes(array("AIAN8"=>$an8));
		$new->mf03012z1->VOTNAC = isset($t)?"C":"A";
		$new->mf03012z1->VOCO = trim($new->SZTICKER);
		$new->mf03012z1->VOEXR1 = "V";
		$new->mf03012z1->VOCRCA = "JPY";
		$new->mf03012z1->VOEDPM = "P";
		$new->mf03012z1->VOUSER = $new->SZUSER;
		$new->mf03012z1->VOPID = $new->SZPID;
		$new->mf03012z1->VOJOBN = $new->SZJOBN;
		//F0401Z1
		$new->mf0401z1->VOEDUS = $new->SZEDUS;
		$new->mf0401z1->VOEDBT = $new->SZEDBT;
		$t = F0401::model()->findByAttributes(array("A6AN8"=>$an8));
		$new->mf0401z1->VOTNAC = isset($t)?"C":"A";;
		$new->mf0401z1->VOEXR2 = "V";
		$new->mf0401z1->VOAB1 = "N";
		$new->mf0401z1->VOCRCA = "JPY";
		$new->mf0401z1->VOUSER = $new->SZUSER;
		$new->mf0401z1->VOPID = $new->SZPID;
		$new->mf0401z1->VOJOBN = $new->SZJOBN;
		//F750401
		$new->mf750401->J4USER = $new->SZUSER;
		$new->mf750401->J4PID = $new->SZPID;
		$new->mf750401->J4JOBN = $new->SZJOBN;
		$new->mf750401->J4TRAP = isset($new->mf0401z1->VOTRAP)?$new->mf0401z1->VOTRAP:null;
		//F0030
		$new->mf0030->AYBKTP = "V";
		$new->mf0030->AYPID = $new->SZPID;
		$new->mf0030->AYUSER = $new->SZUSER;
		$new->mf0030->AYJOBN = $new->SZJOBN;

		if(trim($new->SZAC27) == "G"){
			$new->validatorList->add(
					CValidator::createValidator('required',$new,'SZMCU,SZAC15'));
		}
		$rs1 = $this->checkCV($new);
		if($rs1){
			$rs = $new->save();
			$new->mf750401->id = $new->id;
			$new->mf750401->J4AN8 = $new->SZAN8;
			$new->mf0030->id = $new->id;
			$new->mf0030->AYAN8 = $new->SZAN8;
			$new->mf0111z1->id = $new->id;
			$new->mf0111z1->BWAN8 = $new->SZAN8;
			$new->mf0115TEL->id = $new->id;
			$new->mf0115TEL->PIAN8 = $new->SZAN8;
			$new->mf0115FAX->id = $new->id;
			$new->mf0115FAX->PIAN8 = $new->SZAN8;
			$new->mf0115TEL2->id = $new->id;
			$new->mf0115TEL2->PIAN8 = $new->SZAN8;
			$new->mf0115TEL->no = 1;
			$new->mf0115FAX->no = 2;
			$new->mf0115TEL2->no = 3;
			$new->mf0115TEL->PIEDTL = $new->mf0115TEL->no - 1;
			$new->mf0115FAX->PIEDTL = $new->mf0115FAX->no - 1;
			$new->mf0115TEL2->PIEDTL = $new->mf0115TEL2->no - 1;
			$new->mf01151z1->id = $new->id;
			$new->mf01151z1->EBAN8 = $new->SZAN8;
			$new->mf01161z1->id = $new->id;
			$new->mf01161z1->LBAN8 = $new->SZAN8;
			$new->mf03012z1->id = $new->id;
			$new->mf03012z1->VOAN8 = $new->SZAN8;
			$new->mf0401z1->id = $new->id;
			$new->mf0401z1->VOAN8 = $new->SZAN8;
			$rs = $new->mf750401->save();
			$rs = $new->mf0030->save();
			$rs = $new->mf0111z1->save();
			$rs = $new->mf0115TEL->save();
			$rs = $new->mf0115FAX->save();
			$rs = $new->mf0115TEL2->save();
			$rs = $new->mf0115TEL->save();
			$rs = $new->mf0115FAX->save();
			$rs = $new->mf0115TEL2->save();

			$rs = $new->mf01151z1->save();
			$rs = $new->mf01161z1->save();
			$rs = $new->mf03012z1->save();
			if($new->mf03012z1->VOTNAC == "C"){
				$new->addition = Mf03012z1::model()->findByPk(array('id'=>$new->id,'no'=>2));
				if(!isset($new->addition)){
					$new->addition = new Mf03012z1();
				}
				$new->addition->attributes = $new->mf03012z1->attributes;
				$new->addition->VOCO = "00000";
				$new->addition->no = 2;
				$new->addition->save();
			}
			$rs = $new->mf0401z1->save();
			$this->saveFile($new);
			return true;
		}
		return false;
	}
	public function checkCV($model){
		$criteria = new CDbCriteria();
		$criteria->compare('cd_segment',trim($model->SZAC27));
		if(strlen(trim($model->SZAT1)) > 1){
			$criteria->addCondition('cd_search in ("C","V")');
		}else{
			$criteria->compare('cd_search',trim($model->SZAT1),false);
		}
		$criteria->select = "t.*";
		$provider = new CActiveDataProvider(new Matrix(),array('criteria'=>$criteria));
		foreach($provider->data as $target){
			$rs = true;
			if($target->cd_search == "C"){
				$model->mf03012z1->validatorList->add(
						CValidator::createValidator('required',$model->mf03012z1,$target->cd_valid));
				$rs = $model->mf03012z1->validate();
			}else if($target->cd_search == "V"){
				$model->mf0401z1->validatorList->add(
						CValidator::createValidator('required',$model->mf0401z1,$target->cd_valid));
				$rs = $model->mf0401z1->validate();
			}
			if(!$rs){
				return false;
			}
		}
		return true;
	}
	private function checkTEL($model,$type){
		$condition ="trim(WPAN8) =:a and trim(WPPHTP) = :b";
		$param = array(':a'=>$model->PIAN8,':b'=>$type);
		$target = F0115::model()->find($condition,$param);
		if(isset($target) && strlen(trim($model->PIPH1)) == 0){
			return "D";
		}
		return "C";
	}
	private function checkEMAIL($model){
		$condition ="trim(EAAN8) =:a";
		$param = array(':a'=>$model->EBAN8);
		$target = F01151::model()->find($condition,$param);
		if(isset($target) && strlen(trim($model->EBEMAL)) == 0){
			return "D";
		}
		return "C";
	}
	private function replaceToZenkakuSpace($val){
		if(trim($val) == ''){
			return '　';
		}
		return $val;
	}
	private function saveFile($model){
		if(!isset($_FILES['upload'])){
			return ;
		}
		
		$tmpResume = $_FILES['upload'];
		if(isset($tmpResume['size'])&&$tmpResume['size']>0){
			$uploaded = Yii::app()->file->set('upload');
			$path = $model->id;
			if(defined('YII_LOCAL')){
				for($i = 0;$i < 5;$i++){
					$ext = "*";
					switch($i){
						case 0:$ext = '.pdf';
						break;
						case 1:$ext = '.xls';
						break;
						case 2:$ext = '.xlsx';
						break;
						case 3:$ext = '.doc';
						break;
						case 4:$ext = '.docx';
						break;
					}
					$isExist = "evidence/".$path.$ext;
					$org = Yii::app()->file->set($isExist);
					if ($org->getExists()){
						$rs = $org->delete(true);
					}
				}
				$imgPath = 'evidence/'.$model->id.$uploaded->getExtension();
				$newfile = $uploaded->copy($imgPath);
			}else{
				move_uploaded_file($tmpResume['tmp_name'],'./evidence/'.$model->id.$uploaded->getExtension());
			}
		}
	}
}