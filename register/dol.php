<?php
require('vendor\autoload.php');
$con=mysqli_connect('localhost','root','','users');
$res=mysqli_query($link,"SELECT * FROM users");
if(mysqli_num_rows($res)>0){
	$html='<style></style><table class="table">';
		$html.='<tr><td>'name'</td><td>'contact'</td><td>'location'</td><td>'uuid'</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['$name'].'</td><td>'.$row['$contact'].'</td><td>'.$row['$location'].'</td><td>'.$row['$uuid']'</td></tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>