<h1>
	<i>
	<?php 
		echo "Welcome to Ranking board";
	?>
	</i>
</h1>
	<?php
	echo '<table>';
	$count = 10;
	$rank = 0;
	$loop = 1;
	echo '<tr><td width=10></td><td width=500><b>'.'Google Play Best Selling in Games </b></br></td></tr>';
	for ($i = 0; $i < $loop; $i++) {
		//$filename = 'https://play.google.com/store/apps/collection/topgrossing?start='.$stPage.'&num=24';
		$filename = 'https://play.google.com/store/apps/collection/topselling_paid_game';
		//$filename = 'https://play.google.com/store/apps/top/category/GAME?hl=jp';
		$vv = file_get_contents($filename);
		$strs = explode('<head>',$vv);
		$vv = $strs[0].'<meta http-equiv="content-type" content="text/html; charset=utf-8">'.$strs[1];
		$doc = new DOMDocument();
		@$doc->loadHTML($vv);
		$books = $doc->getElementsByTagName('img');
		$t = 0;
		foreach($books as $book)
		{
			if($t == $count){
				break;
			}
			$ranking = new Ranking();
			if($book->getAttribute('class') == 'cover-image' && $book->getAttribute('alt') != ''){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank.'</td>';
				echo '<td width=500>'.$book->getAttribute('alt').'</td>';
				echo '</tr>';
				$title = $book->getAttribute('alt');
				$ranking->nm = $title;
				$ranking->rnk = $rank;
				$ranking->dtr = 2;
				$ranking->save();
			}
			$t++;
		}
	}
	echo '</table>';
	echo '</br>';
	$limit = 10;
	echo '<table>';
	echo '<tr><td width=10></td><td td width=500><b>'.'AppStore Game Top Selling '.$limit.'</b></br></td></tr>';
	$filename = 'https://itunes.apple.com/jp/rss/toppaidapplications/limit='.$limit.'/genre=6014/xml';
	$xml = simplexml_load_file($filename);
	$roots = $xml->children();
	$rank = 0;
	foreach($roots->entry as $root ){
		if($root->getName() == 'entry'){
		$targets = $root->children('http://itunes.apple.com/rss');
		$ranking = new Ranking();
		foreach($targets as $target){
			if($target->getName()=='name'){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank."</td>";
				echo '<td width=500>'.$target.'</td>';
				echo '</tr>';
				$ranking->rnk = $rank;
				$ranking->nm = $target;
				$ranking->dtr = 1;
			}
			if($target->getName()=='price'){
				$arr = $target->attributes();
				$ranking->price = $arr['amount'];
				$ranking->currency = $arr['currency'];
			}
		}
		$ranking->save();
	}
	}
	echo '</table>';
	?>