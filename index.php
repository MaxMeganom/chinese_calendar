<!--Форма-->
	
	<h1>Введите год по грегорианскому клендарю(1924 - 2043):</h1>
		<form method="post" align="center">
			<p>Год: <input type="text" name="year" /></p>
			<p><input type="submit" name="to-kit-kal" value="Узнать" /></p>
		</form>

<?php
	function showYear($year){
		if (file_exists('kit_kal.xml')) {
			$xml = simplexml_load_file('kit_kal.xml');
			
			
			
			echo "По китайскому календарю ".$xml->offer[$year]->year . " году соответствует<br /> 
			Небесный Столб: ".$xml->offer[$year]->stem .";<br /> 
			Цвет: ".$xml->offer[$year]->color .";<br />
			Ветвь Земли: ".$xml->offer[$year]->animal;
			
			} else {
				exit('Failed to open kit_kal.xml.');
			}
			
	}
	
	if(isset($_POST['year'])){
		$year = abs((int)$_POST['year']);
		if($year>=1924 && $year<=2043){
			showYear($year-1924);
		}else{
			echo "Год не соответсвует заданному диапозону (1924 - 2043)";
		}
	}
?>