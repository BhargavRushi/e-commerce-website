<?php
$id = $_SESSION['id'];
$sql = "select * from users where uid = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res); 
$role = $_SESSION['rid'];
if($role == 1)
{
	include 'adminheader.php';
}
else if($role == 2)
{
	include 'userheader.php';
}
?>
<h2 class = 'text-center text-primary' style = 'font-weight:bold'>Sent</h2>
<div class = "table-responsive-lg">
<table class = "table table-striped">
	<thead class = "thead-dark">
		<tr>
			<td><input type = "checkbox"/></td>
			<td><b>To</b></td>
			<td><b>Subject</b></td>
			<td><b>Message</b></td>
			<td><b>Date</b></td>
		</tr>
	</thead>
	<?php
	$s = "select * from message inner join users on(users.uid = message.to_id) where from_id = '$id' order by message_date desc";
	$r = mysqli_query($con,$s);
	foreach($r as $val)
	{
		$to = $val['email'];
		$sub = $val['subject'];
		$message = $val['message'];
		$m = substr($message,0,50);
		$d = $val['message_date'];
	?>
	<tbody>
		<tr>
			<td><input type = "checkbox"/></td>
			<td><?php echo $to;?></td>
			<td><?php echo $sub;?></td>
			<td><?php echo $m;?></td>
			<td><?php echo $d;?></td>
		</tr>
	</tbody>
	<?php
	}
	?>
</table>
</div>
