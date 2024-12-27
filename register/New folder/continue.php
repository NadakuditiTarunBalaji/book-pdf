<?php
if (isset($_POST["submit"])) {
  ob_start();
    $name=$_POST["full_name"];
    $contact=$_POST["phone_number"];
    $location=$_POST["location"];
    if (!empty($name ) && !empty($contact) && !empty($location) ) {
      $link= mysqli_connect( "localhost","root","","register");
      if ($link==false) {
        # code...
        die(mysqli_connect_error());
      } 
      $sql="INSERT  INTO users(name,contact, location) VALUES('$name','$contact','$location')";
      $id=uniqid();

      $sqll=mysqli_query($link,"INSERT INTO users(name,contact,location,uuid) VALUES('$name','$contact','$location','$id')");
      
      if (mysqli_query($link,$sql)) {
        # code...
        
        echo $id;
        echo" successfully registered";
        require('fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('arial','',12);
        $pdf->Cell(0,10,"Contact Details",1,1,'C');
        $pdf->Cell(40,10,"Name",1,0);
        $pdf->Cell(75,10,"Email",1,0);
        $pdf->Cell(75,10,"Message",1,0);
        $pdf->Ln();
        
        $pdf->Cell(40,10,$name,1,0);
        $pdf->Cell(75,10,$contact,1,0);
        $pdf->Cell(75,10,$location,1,0);
        
        $file = time().'.pdf';
        $pdf->output($file,'D');
        ob_end_flush();

      }
      else{echo"something went wrong";}
      
    }
    else{
        echo "all fields should filled";
    }
    #include("down.php");
}
