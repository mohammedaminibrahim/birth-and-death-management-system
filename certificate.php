<?php
    require_once("./fpdf/fpdf.php");
    require_once("./config.php");

    

    class myPDF extends FPDF {
         //Query to get user information
     
        //define the Header Part of the Document
        function header(){
           // $this->Image("./assets/img/logo.jpg", 10, 6);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(276, 5, "DEATH AND BIRTH CERTIFICATE", 0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276, 5, "Ministry Of Registration", 0,0,'C');
            $this->Ln(20);
           
        }

    
        //define footer for Part of the Document
        function footer(){
            $this->SetY(-15);
            $this->setFont('Arial', '',8);
            $this->Cell(0,10, "Page " . $this->PageNo().'/{nb}', 0, 0, 'C');
        }

        function headerw(){
            // $this->Image("./assets/img/logo.jpg", 10, 6);
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(276, 5, "DEATH AND BIRTH CERTIFICATE", 0,0,'C');
             $this->Ln();
             $this->SetFont('Times','',12);
             $this->Cell(276, 5, "Ministry Of Registration", 0,0,'C');
             $this->Ln(20);
            
         }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->Output();




;?>