<?php
    $email=$_POST['email'];
	$password=$_POST['password'];
	
    $con=mysqli_connect("localhost","root","","work_project");

    if(mysqli_connect_errno())
	{
		echo "Fail".mysqli_connect_error();
	}
    $q=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
	
	if(mysqli_connect_errno())
	{
		echo "Fail".mysqli_connect_error();
	}
	if(mysqli_num_rows($q)>0)
    {
		$row=mysqli_fetch_array($q);
		echo "Hello user ";
	}
	 else
		echo "This user does not exist";
	
	header("location:old_requests.php");
	
	mysqli_close($con);

	?>
		