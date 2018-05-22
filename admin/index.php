<?php require_once("../config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
	if(@$_GET['page']){															// If url contatins ?page=xxx
		if(file_exists("../template/".$_GET['page'].".tpl.php")){				// If The file was found
      include("../template/".$_GET['page'].".tpl.php");							// Include it
		}else{																	// Otherwise
			include("../template/404.tpl.php");									// Include Home
		}
	}else{
		include("../template/admin.tpl.php");									// Include Home
	}
	
	require_once("../footer.php");
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/php");

  function saveFile(){
    //alert("saved");
    $.post( "save.php", { 
      filename: $("#filename").val(), 
      content: editor.getValue() 
    });
  }

  function deleteFile(){
    if(confirm("ARE YOU SURE?")){
      alert("deleted!");
    }
  }
</script>
  </body>
</html>