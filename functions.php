<?php


function getSettingFromDB($setting_name, $conn){
	$sql = "SELECT * FROM config WHERE `option_name` LIKE '".$setting_name."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        return $row["option_value"];
	    }
	} else {
	    return null;
	}
}

function displayMenu($menuname, $conn){
	$sql = "SELECT * FROM `menus` WHERE `name` LIKE '".$menuname."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	echo "<ul>\n";
	        echo parseMenuFromDB($row["links"]);
	    	echo "</ul>\n";
	    }
	} else {
	    return null;
	}
}

function endsWith($haystack, $needle, $case = true) {
    if ($case) {
        return (strcmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
    }
    return (strcasecmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
}

function parseMenuFromDB($input){
	$menuArray = explode("\n", $input);

	foreach($menuArray as $link){
		$tmp = explode("|", $link);
		$tmp1 = @$_GET['page'];
		if(endsWith(trim($tmp[1]), $tmp1) && $tmp1 != null || (endsWith(trim($tmp[1]), "admin") && $tmp1 == null))
			echo "<li class='active'><a href='".SITE_URL.$tmp[1]."'>".$tmp[0]."</a></li>\n";
		else
			echo "<li><a href='".SITE_URL.$tmp[1]."'>".$tmp[0]."</a></li>\n";
	}
	
}

?>