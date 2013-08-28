<h1>
	<i> 
	<?php 
		echo "Welcome to Ranking board";
	?>
	</i>
</h1>
	<?php
	echo '<table>';
	$stPage = 0;
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
		foreach($books as $book)
		{
			if($book->getAttribute('class') == 'cover-image' && $book->getAttribute('alt') != ''){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank.'</td>';
				echo '<td width=500>'.$book->getAttribute('alt').'</td>';
				echo '</tr>';
			}
		}
	}
	echo '</table>';
	echo '</br>';
	$limit = 60;
	echo '<table>';
	echo '<tr><td width=10></td><td td width=500><b>'.'AppStore Game Top Selling '.$limit.'</b></br></td></tr>';
	$filename = 'https://itunes.apple.com/jp/rss/toppaidapplications/limit='.$limit.'/genre=6014/xml';
	$xml = simplexml_load_file($filename);
	$roots = $xml->children();
	$rank = 0;
	foreach($roots->entry as $root ){
		if($root->getName() == 'entry'){
		$targets = $root->children('http://itunes.apple.com/rss');
		foreach($targets as $target){
			//echo $target->getName().'<br/>'; 
			if($target->getName()=='name'){
				$rank++;
				echo '<tr>';
				echo '<td width=10>'.$rank."</td>";
				echo '<td width=500>'.$target.'</td>';
				//Ranking::model()->create($rank, $target);
				
				echo '</tr>';
			}
		}
	}
	}
	echo '</table>';
	?>