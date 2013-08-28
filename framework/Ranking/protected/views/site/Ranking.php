<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Enjoy Ranking Board!</title>
</head>
<body>
	<?php
	echo '<table>';
	$stPage = 0;
	$count = 24;
	$rank = 0;
	$loop = 3;
	echo '<tr><td width=10></td><td width=500><b>'.'Google Play Game Top Grossing'.$loop*$count.'</b></br></td></tr>';
	for ($i = 0; $i < $loop; $i++) {
		$filename = 'https://play.google.com/store/apps/collection/topgrossing?start='.$stPage.'&num=24';
		$vv = file_get_contents($filename);
		$strs = explode('<head>',$vv);
		$vv = $strs[0].'<meta http-equiv="content-type" content="text/html; charset=utf-8">'.$strs[1];
		$doc = new DOMDocument();
		@$doc->loadHTML($vv);
		$books = $doc->getElementsByTagName('a');
		foreach($books as $book)
		{
			if($book->getAttribute('title') != 'オプション' && $book->getAttribute('title') != ''){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank.'</td>';
				echo '<td width=500>'.$book->getAttribute('title').'</td>';
				echo '</tr>';
			}
		}
		$stPage+=$count;
	}
	echo '</table>';
	echo '</br>';
	$limit = 100;
	echo '<table>';
	echo '<tr><td width=10></td><td td width=500><b>'.'AppStore Game Top Selling'.$limit.'</b></br></td></tr>';
	$filename = 'https://itunes.apple.com/jp/rss/toppaidapplications/limit='.$limit.'/genre=6014/xml';
	$xml = simplexml_load_file($filename);
	$roots = $xml->children();
	$rank = 0;
	foreach($roots as $root ){
		if($root->getName() == 'entry'){
		$targets = $root->children();
		foreach($targets as $target){
			if($target->getName()=='title'){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank."</td>";
				echo '<td width=500>'.$target.'</td>';
				echo '</tr>';
			}
		}
	}
	}
	echo '</table>';
	?>
</body>