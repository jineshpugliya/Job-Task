<?=require_once ("theme.php");?>
<center>
        <h1>Student List</h1>
    </center>
<table class="table table-striped table-bordered table-hover" align="center">
<div>	<tr class="table table-striped table-bordered table-hover" align="right">
		<a href="create.php">Register a New Student</a>
	</tr>
	</div>
	<tr>
		<th><center>Sr.No.</center></th>
		<th>Student Name</th>
		<th>Student Class</th>
		<th>Student Roll no</th>
		<th>Student DOB</th>
		<th>Student Addmission Date</th>
		<th><center>Edit</center></th>
		<th><center>Delete</center></th>
		<th><center>Upload Documents</center></th>
		<th><center>Transfer Certificate</center></th>


	</tr>
	<?php
		include "db.php";

		// if id is received, then delete the student with that id
		if (isset($_GET['id'])) {
			$dbob->del('Student', $_GET['id']);
			header("location:".BASE);
		}
		
		// fetch all records from "student" table
		$all=$dbob->fetchAll("SELECT id,name,class,rollno,date,dob FROM Student order by id desc");
		$sn=1;

		// create a row for each record.
		foreach ($all as $data)
		{
			$data=array_map('stripslashes', $data);
	?>
		<tr>
			<td align="center"><?php echo $sn++;  ?></td>
			<td><?php echo $data['name'];  ?></td>
			<td><?php echo $data['class'];  ?></td>
			<td><?php echo $data['rollno'];  ?></td>
			<td><?php echo $data['date'];  ?></td>
			<td><?php echo $data['dob'];  ?></td>

			<td align="center">
				<button><a href="create.php?id=<?php echo $data['id'];  ?>">Edit</a>
				</button></td>
			<td><button>
				<a href="#" onclick="js:del('<?php echo $data['id']; ?>');">Delete</a>
				</button>
				<br/></td>
			<td><button>
				<a href="images.php?pid=<?= $data['id']; ?>">Upload  Documents</a></button>
			</td>
			<td align="center"><button>
				<a href="tc.php?id=<?php echo $data['id'];  ?>">Generate T.C.</a></button>
				</td>
		</tr>
	<?php
		}
	?>
</table>
<script type="text/javascript">
	function del(id)
	{
		if(confirm("Do you really want to delete the record? "))
		{
			location.href='index.php?id='+id;
		}
	}
</script>