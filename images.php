<?php
require_once ("theme.php");
include "db.php";

//get pro id and fetch all images, if pro id is set
if (isset($_GET['pid'])) {
	$pid = $_GET['pid'];
	$all_imgs = $dbob->fetchAll("SELECT * FROM documents WHERE p_id = $pid");
}

//check if image is to be deleted by submitting the form
if (isset($_POST['iid'])) {

	// fetch image data
	$info = $dbob->fetch1('documents', $_POST['iid']);
	if (isset($info['i_name']) && $info['i_name']) {
		//delete image from folder using image name
		unlink("pro_imgs/" . $info['i_name']);
	}
	// delete record from table
	$dbob->del('documents', $_POST['iid']);

	//redirect again to this page with pro id  
	header("location:" . BASE . "images.php?pid=$pid");
}


//add image code
if (isset($_FILES['i_name'])) {
	$img_arr = $_FILES['i_name'];
	$noe = count($img_arr['name']);
	for ($in = 0; $in < $noe; $in++) {
		$ext = substr($img_arr['name'][$in], strrpos($img_arr['name'][$in], '.') + 1);

		//validation to ensure images only
		if ($img_arr['name'][$in] && in_array($ext, ['jpg', 'gif', 'png'])) {

			// concatnate index number of uploaded images with timestamp to get unique image names
			$name = time() . $in . '.' . $ext;
			move_uploaded_file($img_arr['tmp_name'][$in], 'pro_imgs/' . $name);
			$img_data['p_id'] = $pid;
			$img_data['i_name'] = $name;
			$dbob->addEdit('documents', $img_data);
		}

		//redirect to this page only to show recently added images
		header("location:" . BASE . "images.php?pid=$pid");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Student Images</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript">
		function del() {
			if (confirm("Delete the image? ")) {
				// this will submit the form with image id in $_POST array
				return true;
			}
			return false;
		}
	</script>
</head>

<body>
	<div class="col-md-8 col-xs-12">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th colspan="3">
					<center>
						<form method="POST" enctype="multipart/form-data" role="form">
							<legend>Pictures</legend>
							<div class="form-group center">
								<label for="i_name">Add New Picture:</label>
								&nbsp;&nbsp;&nbsp;<input type="file" multiple="multiple" id="iName" name="i_name[]">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<button><a href="index.php">Home</a></button>
						</form>
					</center>
				</th>
			</tr>
			<?php
			if (count($all_imgs) > 0) {
				$sn = 1;
			?>
				<tr>
					<th colspan="4">
						<center>Existing Images</center>
					</th>
				</tr>
				<tr>
					<th>
						<center>Sr.No.</center>
					</th>
					<th>
						<center>Image</center>
					</th>
					<th>
						<center>Action</center>
					</th>
				</tr>
				<?php
					foreach ($all_imgs as $key => $img) {
						?>
					<tr>
						<td align="center" valign="center"><?php echo $sn++;  ?></td>
						<td align="center"><img height="200px" width="200px" src="pro_imgs/<?= $img['i_name'] ?>" />
						</td>
						<!-- delete image using form via get(pid) and post(iid)  both methods -->
						<td align="center" valign="center">
							<form method="post" action="images.php?pid=<?php echo $img['p_id']; ?>">
								<input type="hidden" name="iid" value="<?php echo $img['id']; ?>">
								<button type="submit" class="btn btn-warning" onclick="return del();">Delete</button>
							</form>
						</td>
					</tr>
			<?php
						}
					} else {
						echo "No Documents for this student!";
					}
			?>
		</table>
	</div>
</body>
</html>