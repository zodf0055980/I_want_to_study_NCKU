<html>
	<head>
		<title>公布結果了歐</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets\css\pict.css" />
		<script type="text/javascript" src="assets\js\jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="assets\js\jquery.tablesorter.js"></script> 
	</head>
		<script type="text/javascript">
		$(function () {

			$("#myTable").tablesorter({widgets: ['zebra']});
			
		});	
		
		</script>
	<body>

			<header id="header">
			<div class="logo">分析結果</div>
			</header>
			<section id="main">
				<div class="inner">
					<section id="one" class="wrapper style1">
						<header class="special">
		<?php
		session_start(); 
		ini_set('memory_limit', '256M');
		$con=mysql_connect("localhost","root","密碼");
		if (!$con)
			die('Could not connect: ' . mysql_error());
		mysql_select_db("ncku",$con);
		$chinese=$_POST["chinese"];
		$english=$_POST["english"];
		$math=$_POST["math"];
		$science=$_POST["science"];
		$social=$_POST["social"];

		if(!empty($_POST["college"])) {
			$i = 0;					
			foreach($_POST["college"] as $college) {
				$result=mysql_query("
				SELECT d.Dept_name 
				FROM department d,standard s,standard_index ch,standard_index en,standard_index ma,standard_index so,standard_index sc,standard_index tt
				WHERE d.College = '$college'
				AND s.Dept_code = d.Dept_code
				
				AND s.ch_standerd = ch.Index 
				AND ch.Stand_Subject = '國文'
				AND '$chinese' >= ch.Score
				
				AND s.en_standerd = en.Index 
				AND en.Stand_Subject = '英文'
				AND '$english' >= en.Score
				
				AND s.ma_standerd = ma.Index 
				AND ma.Stand_Subject = '數學'
				AND '$math' >= ma.Score
				
				AND s.so_standerd = so.Index 
				AND so.Stand_Subject = '社會'
				AND '$social' >= so.Score
				
				AND s.en_standerd = sc.Index 
				AND sc.Stand_Subject = '自然'
				AND '$science' >= sc.Score
				
				AND s.en_standerd = tt.Index 
				AND tt.Stand_Subject = '總級分'
				AND '$chinese'+'$english'+'$math'+'$science'+'$social' >= tt.Score
				"
				);				
				while($row = mysql_fetch_array($result)){
					$s1[$i++]=$row['Dept_name'];
				}			
			}
		}
	
		if(!empty($s1)) {	//通過第一條件
			$i = 0;				
			foreach($s1 as $dname) {
				$result=mysql_query("
				SELECT d.Dept_name 
				FROM department d,requirement r,subject s 
				WHERE d.Dept_name = '$dname'
				AND r.Subject1 = s.Subject_num 
				AND r.Dept_code = d.Dept_code
				AND '$chinese' * s.ch_mag + '$english' * s.en_mag + '$math' * s.ma_mag + '$science' * s.sc_mag + '$social' * s.so_mag >= r.Cond1");				
				while($row = mysql_fetch_array($result)){
					$part1[$i++]=$row['Dept_name'];
				}			
			}
		}
		
		if(!empty($part1)) {	//通過第二條件
			$i = 0;			
			foreach($part1 as $dname) {
				$result=mysql_query("
				SELECT d.Dept_name 
				FROM department d,requirement r,subject s 
				WHERE d.Dept_name = '$dname'
				AND r.Subject2 = s.Subject_num 
				AND r.Dept_code = d.Dept_code
				AND '$chinese' * s.ch_mag + '$english' * s.en_mag + '$math' * s.ma_mag + '$science' * s.sc_mag + '$social' * s.so_mag >= r.Cond2");				
				while($row = mysql_fetch_array($result)){
					$part2[$i++]=$row['Dept_name'];
				}			
			}
		}
		if(!empty($part2)) {	 //通過第三條件
			$i = 0;			
			foreach($part2 as $dname) {
				$result=mysql_query("
				SELECT d.Dept_name 
				FROM department d,requirement r,subject s 
				WHERE d.Dept_name = '$dname'
				AND r.Subject3 = s.Subject_num 
				AND r.Dept_code = d.Dept_code
				AND '$chinese' * s.ch_mag + '$english' * s.en_mag + '$math' * s.ma_mag + '$science' * s.sc_mag + '$social' * s.so_mag >= r.Cond3");				
				while($row = mysql_fetch_array($result)){
					$part3[$i++]=$row['Dept_name'];
				}			
			}
		}
		if(!empty($part3)) {	//通過第四條件
			$i = 0;						
			foreach($part3 as $dname) {
				$result=mysql_query("
				SELECT d.Dept_name 
				FROM department d,requirement r,subject s 
				WHERE d.Dept_name = '$dname'
				AND r.Subject4 = s.Subject_num 
				AND r.Dept_code = d.Dept_code
				AND '$chinese' * s.ch_mag + '$english' * s.en_mag + '$math' * s.ma_mag + '$science' * s.sc_mag + '$social' * s.so_mag >= r.Cond4");				
				while($row = mysql_fetch_array($result)){
					$part4[$i++]=$row['Dept_name'];
				}			
			}
		}
		if(!empty($part4)) {	//通過第五條件
			$i = 0;						
			foreach($part4 as $dname) {
				$result=mysql_query("
				SELECT d.Dept_code,d.Dept_name,d.College,d.Campus,i.Cost,i.Date,it.Form
				FROM department d,requirement r,subject s ,interview i,interview_type it
				WHERE d.Dept_name = '$dname'
				AND r.Subject5 = s.Subject_num 
				AND r.Dept_code = d.Dept_code
				AND d.Dept_code = i.Dept_code
				AND r.Dept_code = i.Dept_code
				AND i.Num = it.Num
				AND '$chinese' * s.ch_mag + '$english' * s.en_mag + '$math' * s.ma_mag + '$science' * s.sc_mag + '$social' * s.so_mag >= r.Cond5
				");				
				while($row = mysql_fetch_array($result)){
					$endname[$i]=$row['Dept_name'];
					$endcode[$i]=$row['Dept_code'];
					$endcollege[$i]=$row['College'];
					$endcampus[$i]=$row['Campus'];
					$endcost[$i]=$row['Cost'];
					$enddate[$i]=$row['Date'];
					$endform[$i]=$row['Form'];
					$i++;
				}			
			}
			$_SESSION["id"] = $endcode;
		}
		?>
							<h2>落點分析地圖</h2>
									<div class="init">
									<iframe id="frameid" src="showmap.php" width="800" height="1000" frameborder ="0"></iframe>
									</div>
						</header>
						<div class="content">
							
	<?php	
		$cnt=count($endname);

		echo "你的分數:<br>國 ".$chinese." 英 ".$english." 數 ".$math." 自 ".$science." 社 ".$social."<br><br>";
		echo "你能上的科系:<br>";
		if($cnt!=0){
			echo "<table id=\"myTable\" class=\"tablesorter\">"; 
			echo "<thead>";
			echo "<tr>";
			echo "<th>學院</th>";
			echo "<th>系名</th>";
			echo "<th>校區</th>";
			echo "<th>面試日期</th>";
			echo "<th>面試花費</th>";
			echo "<th>面試形式</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";		
			for($i=0;$i<$cnt;$i++) {
				echo "<tr>";
				echo "<td>".$endcollege[$i]."</td> ";
				echo "<td>".$endname[$i]."</td> ";
				echo "<td>".$endcampus[$i]."</td> ";
				echo "<td>".$enddate[$i]."</td> ";
				echo "<td>".$endcost[$i]."</td> ";
				echo "<td>".$endform[$i]."</td> ";
				echo "</tr> ";
			} 
			echo "</tbody> ";
			echo "</table> ";
		}
		if ($cnt==0) {
			echo "滾去考指考八<br><br><br>";
		}
		mysql_close();
		
	?>
			相關連結:<br>
			<a href="http://material.ncku.edu.tw/">我對使用的圖片素材有興趣</a><br>
			<a href="https://github.com/zodf0055980/I_want_to_study_NCKU">我對網站的原始碼有興趣</a><br>
			<a href="http://web.ncku.edu.tw/files/11-1000-182.php?Lang=zh-tw">我對成大各系網站有興趣</a><br>
			<a href="http://www.ceec.edu.tw/">我對資料來源有興趣</a><br>
			<a href="http://www.uac.edu.tw/">我對指考報名有興趣</a><br>
			</div>
		</section>
	</body>
</html>

