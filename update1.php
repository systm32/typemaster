<?php
error_reporting(E_ALL);
header( 'Content-Type: text/html; charset=utf-8' ); 
require 'db.php';

function addToEnglishDatabase($val,$level,$conn)
{
	mysqli_set_charset($conn,'utf8');
	$query = "INSERT INTO `english`(`value`,`level`) VALUES(?,?)";
	$stmt=$conn->prepare($query);
    $stmt->bind_param("ss",$val,$level);
    $stmt->execute();
//	echo $query;
	if($result = mysqli_query($conn,$query))
	{
		echo true;
	}
	else
	{
//		echo mysqli_error($conn);
		echo false;
	}
}

function addToPunjabiDatabase($val,$level,$conn)
{
	mysqli_set_charset($conn,'utf8');
	$query = "INSERT INTO `punjabi`(`value`,`level`) VALUES(?,?)";
	$stmt=$conn->prepare($query);
    $stmt->bind_param("ss",$val,$level);
    $stmt->execute();
	echo $query;
	if($result = mysqli_query($conn,$query))
	{
		echo true;
	}
	else
	{
		echo mysqli_error($conn);
		echo false;
	}
}

function getRandomFromEnglishDatabase($conn,$level)
{
	$query = "SELECT * FROM `english` WHERE level = $level";
	if($result = mysqli_query($conn,$query))	
	{
		$len = mysqli_num_rows($result);
		$rand_no = rand(1,$len);
		$count = 0;
		$loc = "";
		while($row = mysqli_fetch_assoc($result))
		{	
			$loc = $row['value'];
			$count++;
			if($count == $rand_no)
			{
				break;
			}
		}
		return $loc;
	}
	else
	{
		echo mysqli_error($conn);
	}
}

function getRandomFromPunjabiDatabase($conn,$level)
{
	mysqli_set_charset($conn,'utf8');
	$query = "SELECT * FROM `punjabi` WHERE level = '$level'";
	if($result = mysqli_query($conn,$query))
	{
		$len = mysqli_num_rows($result);
		$rand_no = rand(1,$len);
		$count = 0;
		$loc = "";
		while($row = mysqli_fetch_assoc($result))
		{
			$loc = $row['value'];
			$count++;
			if($count == $rand_no)
			{
				break;
			}
		}
		return $loc;
	}
	else
	{
		echo mysqli_error($conn);
		return false;
	}
}

$tag = $_REQUEST['tag'];

if($tag == '1')
{
	$val = $_REQUEST['val'];
	$level = $_REQUEST['level'];
	return addToEnglishDatabase($val,$level,$conn);
}
else if($tag == '2')
{
	$val = $_REQUEST['val'];
	$level = $_REQUEST['level'];
	return addToPunjabiDatabase($val,$level,$conn);
}
else if($tag == '3')
{
	$level = $_REQUEST['level'];
	echo getRandomFromEnglishDatabase($conn,$level);
}
else if($tag == '4')
{
	$level = $_REQUEST['level'];
	echo getRandomFromPunjabiDatabase($conn,$level);
}



?>