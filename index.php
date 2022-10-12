<?php
$host = 'db';
$db_name = 'magazin';
$db_user = 'root';
$db_pas = '1234';

try {
	$db = new PDO('mysql:host='.$host.';dbname='.$db_name,$db_user,$db_pas);
}
catch (PDOException $e) {
	print "error: " . $e->getMessage();
	die();
}
echo '
<table>
	<thead>
		<tr>
			<th>Название</th>
			<th>Описание</th>
			<th>Цена</th>
			<th>Количество</th>
			<th>Категория</th>
		</tr>
	</thead>
	<tbody>';
$stmt = $db->query("SELECT t.`ID`,`TITLE`,`DESCRIPTION`,`PRICE`,`COUNT`,`NAME` FROM `tovary` AS t JOIN `kategorii` AS k ON t.ID_CAT=k.ID");
while ($row = $stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['TITLE'].'</td><td>'.$row['DESCRIPTION'].'</td><td>'.$row['PRICE'].'</td><td>'.$row['COUNT'].'</td><td>'.$row['NAME'].'</td>';
	echo '</tr>';
}
echo '</tbody></table>'
?>
