<html>
  <head>
	<meta charset="utf-8">
    <title>成大落點分析</title>
	<link rel="stylesheet" href="assets\css\index.css" />
  </head>

	<script type="text/javascript"> 
	function check_all(obj,cName) 
	{ 
		var checkboxs = document.getElementsByName(cName); 
		for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
	}
	</script> 
	<body>
	<div style="text-align:center;";><p>請輸入你的學測各科級分(0~15)</p></div>
	<form action="select.php" method="post">
	<div id="DIV_B">
	國文: <input type="text" name="chinese" class="sor" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="2"/><br>
	英文: <input type="text" name="english" class="sor" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="2"/><br>
	數學: <input type="text" name="math" class="sor" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="2"/><br>
	自然: <input type="text" name="science" class="sor" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="2"/><br>
	社會: <input type="text" name="social" class="sor" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="2"/>
	</div>
	<div style="text-align:center;"><p>請選擇你有興趣的學院</p></div>
	<div id="DIV_C">
	<input type="checkbox" name="college[]" value="文學院"/>文學院<br>
	<input type="checkbox" name="college[]" value="理學院"/>理學院<br>
	<input type="checkbox" name="college[]" value="工學院"/>工學院<br>
	<input type="checkbox" name="college[]" value="電資學院"/>電機資訊學院<br>
	<input type="checkbox" name="college[]" value="管理學院"/>管理學院<br>
	<input type="checkbox" name="college[]" value="社會科學院"/>社會科學院<br>
	<input type="checkbox" name="college[]" value="規劃與設計學院"/>規劃與設計學院<br>
	<input type="checkbox" name="college[]" value="生物科學與科技學院">生物科學與科技學院<br>
	<input type="checkbox" name="college[]" value="醫學院">醫學院<br>
	<input type="checkbox" name="college[]" value="不分系">全校不分系學士學位學程<br> 
	<input type="checkbox" name="all" onclick="check_all(this,'college[]')" />全選/全不選 <br><br>
	<input type="submit" value="Are U ready for NCKU?" class="bot">
	</div>
	</form>

  </body>
</html>