<div id="container">
	<div id="left-sidebar">

		<div id="top">
			<h1><?php echo getSettingFromDB("site_name", $conn); ?></h1>
		</div>
		<div id="menu">
			<?php displayMenu("adminmenu", $conn); ?>
		</div>
	</div>
	<div class="files-section">
		<h1>files</h1>
		<center>
		
			
				<?php 
				$files = scandir("../template/");
				foreach($files as $file){
					if($file=="." || $file=="..") continue;
					$file = str_replace(".tpl.php","", $file);
					if(@$_GET['file'] == $file){
						$isActive = "active";
					}else{
						$isActive = "";
					}
					echo '<div class="file-tile '.$isActive.'"><a href="index.php?page=posts&file='.$file.'">'.$file.'</a><br></div>';
				}
				?>
		
			</center>
	</div>
	<div id="content">
	<div id="top-bar"><p><i class="fa fa-bars fa-3" aria-hidden="true"></i></p></div>
	 <div style="width:90%;margin:0 auto;">
	 	<button id="singlebutton" name="singlebutton" class="btn btn-primary right" onclick="saveFile();"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
	 	<button id="button2id" name="button2id" class="btn btn-danger right" onclick="deleteFile();"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
	 	<input  type="text" id="filename" placeholder="Title" class="form-control input-md" value="<?php echo $_GET['file']; ?>" style="display:inline-block;color:white;background:#272822;">
	 	<br>
	 	<textarea id="editor">
		 	<?php
		 		if(@$_GET['file'])
		 			echo file_get_contents("../template/".$_GET['file'].".tpl.php");
		 	?>
	 	</textarea >
	 </div>
	</div>
</div>