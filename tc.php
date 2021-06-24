<center>
        <h1>Toppers Public School</h1>
    </center>
<?php
require_once ("theme.php");

	include "db.php";
	$id = "";

	// if student id is received, it means student is to be updated. So, fetch record of that student to fill in corresponding form fields
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$info=$dbob->fetch1('student',$id);	
	}


	
?>
<div class="col-md-8 col-xs-12" >
	<h3>Generate Transfer Certificate</h3>
	<form method="post" >
		<span>Student Name: </span>
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
		<div><button onClick="window.print()">Print this page
</button></div>
		</div>
	</form>
</div>