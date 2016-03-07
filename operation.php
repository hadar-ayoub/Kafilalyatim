<?php 

$get = htmlspecialchars($_GET["artcile"]);

function get_artcile_content($get) {
	$return_arr = array();


	$fetch = mysql_query("SELECT * FROM Artcile where article_id=" . $get . ""); 

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	    $row_array['id'] = $row['id'];
	    $row_array['title'] = $row['titre'];
	    $row_array['photo'] = $row['url'];
	    $row_array['Content'] = $row['article'];
	    $row_array['date'] = $row['datecreation'];
	    $row_array['createdby'] = $row['creepar'];

	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
}

function get_artciles_index() {
	$return_arr = array();


	$fetch = mysql_query("SELECT id,title,SUBSTRING(content, 1, 80) FROM Article limit 4 "); 

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	    $row_array['id'] = $row['id'];
	    $row_array['title'] = $row['titre'];
	    $row_array['Content'] = $row['article'];
	    $row_array['date'] = $row['datecreation'];

	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
}
function get_artciles_news() {
	$return_arr = array();


	$fetch = mysql_query("SELECT id,title,SUBSTRING(content, 1, 100) FROM Article "); 

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	    $row_array['id'] = $row['id'];
	    $row_array['title'] = $row['titre'];
	    $row_array['photo'] = $row['url'];
	    $row_array['Content'] = $row['article'];
	    $row_array['date'] = $row['datecreation'];
	    $row_array['createdby'] = $row['creepar'];
	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
}

?>