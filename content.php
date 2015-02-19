<?php
	$result = mysql_query("SELECT * FROM data") or die(mysql_error());
	$data = mysql_fetch_array($result);
	do {
		printf('
			<div class="article">
				<a class="title" href ="view.php?id=%s">%s</a>
				<img class="image" src="%s" width="760" />
				<p>%s</p>
			</div>
		',$data["id"],$data["title"],$data["img"],$data["m_desc"]);
	}
	while($data = mysql_fetch_array($result));
?>