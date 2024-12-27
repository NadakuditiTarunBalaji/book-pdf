$html = "Hello World";
     $mpdf = new mPDF();
     $mpdf->WriteHTML($html);
     $mpdf->Output("phpflow.pdf", 'F');
     $mpdf->Output();