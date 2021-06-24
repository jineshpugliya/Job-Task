<?=require_once ("theme.php");?>
<center>
        <h1>Student Registration Form</h1>
    </center>
<?php
	include "db.php";
	$id = "";

	// if student id is received, it means student is to be updated. So, fetch record of that student to fill in corresponding form fields
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$info=$dbob->fetch1('student',$id);	
	}

	//save the student(insert or update both)
	if (isset($_POST['name'])) {
		$_POST=array_map('addslashes',array_map('ucfirst', array_map('strtolower',$_POST)));
		$dbob->addEdit('Student',$_POST, $id);
		header("location:".BASE);
	}
	
?>
<div class="col-md-8 col-xs-12" >

	<form method="post" >
		<h5><span>Student Name: </span>
		<input class="form-control" type="text" name="name" value="<?php if($id)  echo $info['name']; ?>" />
		<br/>
		<span>Class </span>
		<input class="form-control" type="text" name="class" value="<?php if($id)  echo $info['class']; ?>" />
		<br/>
		<span>Roll Number </span>
		<input class="form-control" type="number" name="rollno" value="<?php if($id)  echo $info['rollno']; ?>" />
		<br/>
		<span>Date of Birth </span>
		<input class="form-control" type="date" name="dob" value="<?php if($id)  echo $info['dob']; ?>" />
		<br/>
		<div>
		<button class="btn btn-primary" type="submit"><strong>Save</strong></button>
		</div></h5>
	</form>
</div>