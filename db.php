<?php 
	class Db
	{
		var $con;
		public function __construct()
		{
			define('BASE', "http://localhost/job_task/");
			$this->con=mysqli_connect("localhost","root","","task");
		}
		function addEdit($tab,$data,$id='')
		{
			$sql="INSERT INTO $tab SET ";
			$where="";
			if($id):
				$sql="UPDATE $tab SET ";
				$where=" WHERE id=$id";
			endif;
			foreach ($data as $cName => $cValue) {
				$sql.="$cName='$cValue',";
			}
			$sql=substr($sql, 0,-1).$where;
			mysqli_query($this->con,$sql);
		}
		function fetch1($tab,$id)
		{
			$sql="SELECT * FROM $tab WHERE id=$id";
			return mysqli_fetch_assoc(mysqli_query($this->con,$sql));
		}
		function fetchAll($sql)
		{
			return mysqli_fetch_all(mysqli_query($this->con,$sql),MYSQLI_ASSOC);
		}
		function del($tab,$id)
		{
			$sql="DELETE FROM $tab WHERE id=$id";
			mysqli_query($this->con,$sql);
		}
	}
	$dbob=new Db;
?>