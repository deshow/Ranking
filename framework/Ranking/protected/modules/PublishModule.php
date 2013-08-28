<?php
class PublishModule extends CWebModule{
	public $config = null;
	
	public function run($mode){
		$this->config = Msconfig::model()->getValue($mode);
		$arr = Yii::app()->pub->loadSE_TM030($this->config->val);
		$saveOrNot = 0;
		foreach($arr as $row){
			$saveOrNot += $this->saveAtLocal($row);
		}
		if($saveOrNot == 0){
			$this->config->val = date('y-m-d');
			$this->config->save();
		}
	}
	private function saveAtLocal($row){
		$model = new Mf0101z2();
		$model->initChild();
		$model->id_user = "shuppan";
		$model->SZAN8 = '6'.trim($row['CD_TORIHIKISAKI']);
		$model->SZAC27 = "Y";
		$model->SZALPH = trim($row['NM_TORIHIKISAKI']);
		$model->SZMLN1 = trim($row['NM_TORIHIKISAKI']);
		$model->SZALP1 = trim($row['KN_TORIHIKISAKI']);
		$model->SZTICKER = "00100";
		$szat1 = "";
		if(trim($row['FG_DELETE']) == '1'){
			$szat1 = 'XA';
		}else{
			if($row['FG_TOKUISAKI'] == '1'){
				$szat1 = 'C';
				$model->mf03012z1->VOCRCD = "JPY";
				$model->mf03012z1->VOTRAR = "Z1Z";
				$model->mf03012z1->VORYIN = "1";
				$model->mf03012z1->VOTXA1 = "10";
				$model->mf03012z1->VOACL = "0";
			}
			if($row['FG_SHIIRESAKI'] == '1'){
				$szat1 = $szat1.'V';
				$model->mf0401z1->VOCRRP = "JPY";
				$model->mf0401z1->VOTRAP = "Z1Z";
				$model->mf0401z1->VOPYIN = "1";
				$model->mf0401z1->VOTXA2 = "13";
				$model->SZAC05 = "1";
			}
		}
		$model->SZAT1 = $szat1;
		$model->SZAC28 = "20";
		$model->SZAC01 = "10";
		$model->SZCTR = "JP";
		$model->SZADDZ = $row['NO_YUBIN'];
		$model->SZADD1 = $row['NM_ADDRESS1'];
		$model->SZADD2 = $row['NM_ADDRESS2'];
		$model->SZADD3 = $row['NM_ADDRESS3'];
		if(trim($row['NO_TEL']) != "" && $row['NO_TEL'] != "0"){
			$model->mf0115TEL->PIPH1 = $row['NO_TEL'];
		}
		$model->SZAN86 = $model->SZAN8;
		$myValue = "";
		switch(trim($row['KB_GENSEN'])){
			Case "1":$myValue = "5";
			break;
			Case "2":$myValue = "5";
			break;
			Case "3":$myValue = "A";
			break;
			Case "4":$myValue = "L";
			break;
			Case "5":$myValue = "K";
			break;
			Case "6":$myValue = "9";
			break;
			Case "7":$myValue = "L";
			break;
			Case "8":$myValue = "1";
			break;
			Case "9":$myValue = "L";
			break;
			Case "A":$myValue = "1";
			break;
			Case "B":$myValue = "L";
			break;
			Case "C":$myValue = "L";
			break;
		}
		$model->SZAC06 = $myValue;
		$model->SZCLASS04 = "JPY";
		$model->SZAN85 = $model->SZAN8;
		$model->mf750401->J4JPTY = "7";
		$model->mf0030->AYTNST = $row['CD_GINKO'].$row['CD_SHITEN'];
		$model->mf0030->AYCKSV = $row['KB_KOZA_SHUBETSU'];
		if(isset($row['NO_KOZA_FURIKOMISAKI'])){
			$model->mf0030->AYCBNK = str_pad($row['NO_KOZA_FURIKOMISAKI'], 7, "0", STR_PAD_LEFT);
		}
		$model->mf0030->AYDL01 = $row['KN_KOZA_MEIGI'];
		$model->SZRMK =$row['NM_PENNAME_ALL'];
		$rs = 1;
		if(Yii::app()->cf->saveAtLocal($model)){
			//Yii::app()->mailler->sendMail('parkkumc','出版バッチ OK');
			$rs = 0;
		}else{
			//Yii::app()->mailler->sendMail('parkkumc','出版バッチ ERROR');
		}
		return $rs;
	}
}