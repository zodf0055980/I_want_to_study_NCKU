<html>
  <head>
    <meta charset="utf-8">
    <title>地圖</title>
	<link rel="stylesheet" href="assets\css\map.css" />
  </head>
  
  <body>
		<div class="init">
		<img src="images\map.jpg" width="780">
		</div>
		<div class="i1">
		<img src="images\成功廳.png" width="120">
		</div>
		<div class="i2">
		<img src="images\成大博物館.png" width="78">
		</div>
		<div class="i3">
		<img src="images\總圖.png" width="120">
		</div>
		<div class="i4">
		<img src="images\榕園.png" width="90">
		</div>
		<div class="i5">
		<img src="images\飛撲.png" width="60">
		</div>
		<div class="hos1">
		<img src="images\hos.png" width="60">
		</div>
		<div class="hos2">
		<img src="images\hos.png" width="60">
		</div>

	<?php
		session_start();
		$endcode = $_SESSION["id"];
		$cnt=count($endcode);
		for($i=0;$i<$cnt;$i++) {
			if($endcode[$i]!=452){
			echo "<div class=\"p".$endcode[$i]."\">";
			echo "<img src=\"images\\".$endcode[$i].".jpg\" width=60%>";
			echo "</div>";
			}
		} 
		
		if ($cnt==0) {
			echo "<div class=\"gg\">";
			echo "<img src=\"images\gg.png\" width=\"100%\">";
			echo "</div>";
		}
		session_destroy();
	?>
  </body>
</html>
