<?php
// Initialize the session
session_start();

// Include config file
require_once "../../config.php";


// Check if license has expired
$sqlLicense = "SELECT * FROM license WHERE id ='1'";
if($resultLicense = mysqli_query($link, $sqlLicense)){
    if(mysqli_num_rows($resultLicense) > 0){
        while($rowLicense = mysqli_fetch_array($resultLicense)){
            // Assign old license date
            $oldDate = $rowLicense['valid_until'];
            // Assign current license date
            $newDate = date("Y-m-d");
            // Assign date sections into variable
            $time = strtotime($oldDate);
            $month = date("F",$time);
            $year = date("Y",$time);
            $day = date("j",$time);
            $oldDateFormated = $day." ".$month." ".$year;
        }
        // Free result set
        mysqli_free_result($resultLicense);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not able to execute $sqlLicense. " . mysqli_error($link);
}
if($oldDate < $newDate){
    
  // Destroying session
    session_destroy();
} 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 400){
    header("location: ../../../auth.php");
    exit;
}

require('fpdf/fpdf.php');



$pdf = new FPDF();

// New page
$pdf->AddPage();


//Begin header


// Add image to page
// Image location, x-axis, y-axis, Image size
$pdf->Image('img/logo.png',5,5,20);

// Begin row
$pdf->Cell(10,0,'',0,0,'C');
$pdf->SetFont('Arial','B',18);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(100,5,"SEAT OF WISDOM SEMINARY",0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(70,5,'STUDENT PERSONAL INFO:','LRT',2,'L');
$pdf->Ln(0);
// End of row

// Begin row
$pdf->Cell(10,0,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(100,5,'(Affiliate of Imo State University, Owerri)',0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(70,5,"Name: ".$_SESSION["studentName"],'LR',2,'L');
$pdf->Ln(0);
// End row

// Begin row
$pdf->Cell(10,0,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(100,5,'PHILOSOPHY DEPARTMENT',0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(70,5,"Matric_NO: ".$_SESSION["matricNumber"],'LRB',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->Cell(10,0,'',0,0,'C');
$pdf->SetFont('Arial','B',10);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(100,5,'(EXAMS & RECORD COPY)',0,2,'C');
$pdf->Ln(10);
// End row


// End header




// Begin body


// Begin first year
//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(0,10,'FIRST YEAR '.$_SESSION["admissionYear1"],'LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(95,10,'FIRST SEMESTER','LRT',0,'C');
$pdf->Cell(95,10,'SECOND SEMESTER','LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','B',0,'L');
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','RB',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(206,202,200);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 101','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro. Phil',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL101"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL101grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL101gp"],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 104','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro to Soc.',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL104"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL104grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL104gp"],'R',2,'L',true);
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,3,'','L',0,'L',true);
$pdf->Cell(21.9,3,'',0,0,'L',true);
$pdf->Cell(13.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(11.9,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'','L',0,'L',true);
$pdf->Cell(21.9,3,'& Pol. Phil',0,0,'L',true);
$pdf->Cell(13.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(11.9,3,'','R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 107','L',0,'L');
$pdf->Cell(21.9,6,'Study Meth',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION["PHIL107"],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL107grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL107gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 116','L',0,'L');
$pdf->Cell(21.9,6,'Fund. Meta.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL116'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL116grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL116gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 135','L',0,'L',true);
$pdf->Cell(21.9,6,'Elem. Ethics',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL135'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL135grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL135gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 146','L',0,'L',true);
$pdf->Cell(21.9,6,'Anc. Phil.',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL146'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL146grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL146gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'REL 141','L',0,'L');
$pdf->Cell(21.9,6,'Rel. & H. Value',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['REL141'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['REL141grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['REL141gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 162','L',0,'L');
$pdf->Cell(21.9,6,'Phil of Human',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL162'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL162grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL162gp'],'R',2,'L');
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,2,'','L',0,'L');
$pdf->Cell(21.9,1,'',0,0,'L');
$pdf->Cell(13.8,1,'',0,0,'L');
$pdf->Cell(15.8,1,'',0,0,'L');
$pdf->Cell(15.8,1,'',0,0,'L');
$pdf->Cell(11.9,1,'',0,0,'L');
$pdf->Cell(15.8,2,'','L',0,'L');
$pdf->Cell(21.9,0,'Nature',0,0,'L');
$pdf->Cell(13.8,1,'',0,0,'L');
$pdf->Cell(15.8,1,'',0,0,'L');
$pdf->Cell(15.8,1,'',0,0,'L');
$pdf->Cell(11.9,2,'','R',2,'L');
$pdf->Ln(0);
// End row


//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'FRN 101','L',0,'L',true);
$pdf->Cell(21.9,6,'French',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['FRN101'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['FRN101grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['FRN101gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 172','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro. Logic',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL172'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL172grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL172gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'GST 101','L',0,'L');
$pdf->Cell(21.9,6,'Use of Eng.',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['GST101'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['GST101grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['GST101gp'],0,0,'L');
$pdf->Cell(15.8,6,'FRN 102','L',0,'L');
$pdf->Cell(21.9,6,'French II',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['FRN102'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['FRN102grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['FRN102gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'GST 103','L',0,'L',true);
$pdf->Cell(21.9,6,'Cit. Edu.',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['GST103'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST103grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['GST103gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'GST 102','L',0,'L',true);
$pdf->Cell(21.9,6,'Use of Eng. II',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['GST102'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST102grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['GST102gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'GST 105','L',0,'L');
$pdf->Cell(21.9,6,'Phil & logic',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['GST105'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['GST105grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['GST105gp'],0,0,'L');
$pdf->Cell(15.8,6,'GST 104','L',0,'L');
$pdf->Cell(21.9,6,'His. & Phil. Sci.',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['GST104'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['GST104grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['GST104gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'','L',0,'L',true);
$pdf->Cell(21.9,6,'',0,0,'L',true);
$pdf->Cell(13.8,6,'',0,0,'L',true);
$pdf->Cell(15.8,6,'',0,0,'L',true);
$pdf->Cell(15.8,6,'',0,0,'L',true);
$pdf->Cell(11.9,6,'',0,0,'L',true);
$pdf->Cell(15.8,6,'GST 106','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro Computer',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['GST106'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST106grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['GST106gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'','LB',0,'L');
$pdf->Cell(21.9,6,'','B',0,'L');
$pdf->Cell(13.8,6,'','B',0,'L');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(11.9,6,'','B',0,'L');
$pdf->Cell(15.8,6,'GST 108','LB',0,'L');
$pdf->Cell(21.9,6,'Entrepreneurship','B',0,'L');
$pdf->Cell(13.8,6,'2','B',0,'C');
$pdf->Cell(15.8,6,$_SESSION['GST108'],'B',0,'L');
$pdf->Cell(15.8,6,$_SESSION['GST108grade'],'B',0,'L');
$pdf->Cell(11.9,6,$_SESSION['GST108gp'],'RB',2,'L');
$pdf->Ln(1);
// End row


// Section for TOTAL CU, TOTAL GP, SEMESTER GPA
//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_FIRST_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_1'],'RBT',0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_FIRST_YEAR_SEMSTER_2'],'RBT',0,'L');
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_FIRST_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(10);
// End row
// End first year




// Begin second year
//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(0,10,'SECOND YEAR '.$_SESSION["admissionYear2"],'LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(95,10,'FIRST SEMESTER','LRT',0,'C');
$pdf->Cell(95,10,'SECOND SEMESTER','LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','B',0,'L');
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','RB',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(206,202,200);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 201','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro. To Epis.',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL201"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL201grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL201gp"],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 216','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil. Athro.',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL216"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL216grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL216gp"],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 223','L',0,'L');
$pdf->Cell(21.9,6,'Fund. Meta.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION["PHIL223"],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL223grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL223gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 236','L',0,'L');
$pdf->Cell(21.9,6,'Prof. Ethics',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL236'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL236grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL236gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 243','L',0,'L',true);
$pdf->Cell(21.9,6,'Med. Phil.',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL243'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL243grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL243gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 242','L',0,'L',true);
$pdf->Cell(21.9,6,'Early Mod Phil',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL242'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL242grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL242gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 245','L',0,'L');
$pdf->Cell(21.9,6,'African Phil.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL245'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL245grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL245gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 246','L',0,'L');
$pdf->Cell(21.9,6,'African Phil. II',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL246'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL246grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL246gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 265','L',0,'L',true);
$pdf->Cell(21.9,6,'Cosmology',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL265'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL265grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL265gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 262','L',0,'L',true);
$pdf->Cell(21.9,6,'Seminar',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL262'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL262grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL262gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row


//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 271','L',0,'L');
$pdf->Cell(21.9,6,'Symbolic Logic',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL271'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL271grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL271gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 264','L',0,'L');
$pdf->Cell(21.9,6,'Phil of Arts &',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL264'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL264grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL264gp'],'R',2,'L');
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,3,'','L',0,'L');
$pdf->Cell(21.9,3,'',0,0,'L');
$pdf->Cell(13.8,3,'',0,0,'L');
$pdf->Cell(15.8,3,'',0,0,'L');
$pdf->Cell(15.8,3,'',0,0,'L');
$pdf->Cell(11.9,3,'',0,0,'L');
$pdf->Cell(15.8,3,'','L',0,'L');
$pdf->Cell(21.9,3,'Aesth',0,0,'L');
$pdf->Cell(13.8,3,'',0,0,'L');
$pdf->Cell(15.8,3,'',0,0,'L');
$pdf->Cell(15.8,3,'',0,0,'L');
$pdf->Cell(11.9,3,'','R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'GST 223','L',0,'L',true);
$pdf->Cell(21.9,6,'Entrep Dev II',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['GST223'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST223grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['GST223gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 268','L',0,'L',true);
$pdf->Cell(21.9,6,'Nat. Theo',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL268'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL268grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL268gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'','L',0,'L');
$pdf->Cell(21.9,6,'',0,0,'L');
$pdf->Cell(13.8,6,'',0,0,'C');
$pdf->Cell(15.8,6,'',0,0,'L');
$pdf->Cell(15.8,6,'',0,0,'L');
$pdf->Cell(11.9,6,'',0,0,'L');
$pdf->Cell(15.8,6,'CMP 202','L',0,'L');
$pdf->Cell(21.9,6,'Intro Computer',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['CMP202'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['CMP202grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['CMP202gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'','L',0,'L');
$pdf->Cell(21.9,6,'',0,0,'L');
$pdf->Cell(13.8,6,'',0,0,'C');
$pdf->Cell(15.8,6,'',0,0,'L');
$pdf->Cell(15.8,6,'',0,0,'L');
$pdf->Cell(11.9,6,'',0,0,'L');
$pdf->Cell(15.8,6,'GST 222','L',0,'L',true);
$pdf->Cell(26.9,6,'Peace & Conflict',0,0,'L',true);
$pdf->Cell(9,6,'2',0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST222'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['GST222grade'],0,0,'L',true);
$pdf->Cell(11.7,6,$_SESSION['GST222gp'],'R',2,'L',true);
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,3,'','LB',0,'L');
$pdf->Cell(21.9,3,'','B',0,'L');
$pdf->Cell(13.8,3,'','B',0,'L');
$pdf->Cell(15.8,3,'','B',0,'L');
$pdf->Cell(15.8,3,'','B',0,'L');
$pdf->Cell(11.9,3,'','B',0,'L');
$pdf->Cell(15.8,3,'','LB',0,'L',true);
$pdf->Cell(21.9,3,'Resolution','B',0,'L',true);
$pdf->Cell(13.8,3,'','B',0,'L',true);
$pdf->Cell(15.8,3,'','B',0,'L',true);
$pdf->Cell(15.8,3,'','B',0,'L',true);
$pdf->Cell(11.9,3,'','RB',2,'L',true);
$pdf->Ln(1);
// End row


// Section for TOTAL CU, TOTAL GP, SEMESTER GPA
//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_SECOND_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_1'],'RBT',0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_SECOND_YEAR_SEMSTER_2'],'RBT',0,'L');
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_SECOND_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(10);
// End row
// End second year




// New page
$pdf->AddPage();





// Begin third year
//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(0,10,'THIRD YEAR '.$_SESSION["admissionYear3"],'LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(95,10,'FIRST SEMESTER','LRT',0,'C');
$pdf->Cell(95,10,'SECOND SEMESTER','LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','B',0,'L');
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','RB',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(206,202,200);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 323','L',0,'L',true);
$pdf->Cell(21.9,6,'Theories of knl',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL323"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL323grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL323gp"],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 332','L',0,'L',true);
$pdf->Cell(21.9,6,'Cont. Issues in Ethics',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL332"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL332grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL332gp"],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 341','L',0,'L');
$pdf->Cell(21.9,6,'Later Mod. Phil',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION["PHIL341"],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL341grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL341gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 334','L',0,'L');
$pdf->Cell(21.9,6,'Landmark Phil.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL334'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL334grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL334gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 345','L',0,'L',true);
$pdf->Cell(21.9,6,'Oriental Phil.',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL345'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL345grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL345gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 362','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil of Religion',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL362'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL362grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL362gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 361','L',0,'L');
$pdf->Cell(21.9,6,'Soc. & Pol. Phil.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL361'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL361grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL361gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 364','L',0,'L');
$pdf->Cell(21.9,6,'Phil of Sci.',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL364'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL364grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL364gp'],'R',2,'L');
$pdf->Ln(0);
// End row


//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 363','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil Anthro',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL363'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL363grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL363gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 366','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil of Lang.',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL366'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL366grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL366gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 305','L',0,'L');
$pdf->Cell(21.9,6,'Research Method',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL305'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL305grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL305gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 372','L',0,'L');
$pdf->Cell(21.9,6,'Advance Logic',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL372'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL372grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL372gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'REL 355','L',0,'L',true);
$pdf->Cell(21.9,6,'ATR II',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['REL355'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['REL355grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['REL355gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'HIS 362','L',0,'L',true);
$pdf->Cell(21.9,6,'Evolution of',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['HIS362'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['HIS362grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['HIS362gp'],'R',2,'L',true);
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,2,'','L',0,'L',true);
$pdf->Cell(21.9,2,'',0,0,'L',true);
$pdf->Cell(13.8,2,'',0,0,'L',true);
$pdf->Cell(15.8,2,'',0,0,'L',true);
$pdf->Cell(15.8,2,'',0,0,'L',true);
$pdf->Cell(11.9,2,'',0,0,'L',true);
$pdf->Cell(15.8,2,'','L',0,'L',true);
$pdf->Cell(21.9,2,'CW',0,0,'L',true);
$pdf->Cell(13.8,2,'',0,0,'L',true);
$pdf->Cell(15.8,2,'',0,0,'L',true);
$pdf->Cell(15.8,2,'',0,0,'L',true);
$pdf->Cell(11.9,2,'','R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'GPD 313','LB',0,'L');
$pdf->Cell(21.9,6,'P. P Analysis','B',0,'L');
$pdf->Cell(13.8,6,'2','B',0,'C');
$pdf->Cell(15.8,6,$_SESSION['GPD313'],'B',0,'L');
$pdf->Cell(15.8,6,$_SESSION['GPD313grade'],'B',0,'L');
$pdf->Cell(11.9,6,$_SESSION['GPD313gp'],'B',0,'L');
$pdf->Cell(15.8,6,'','LB',0,'L');
$pdf->Cell(21.9,6,'','B',0,'L');
$pdf->Cell(13.8,6,'','B',0,'C');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(11.9,6,'','RB',2,'L');
$pdf->Ln(1);
// End row


// Section for TOTAL CU, TOTAL GP, SEMESTER GPA
//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_THIRD_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_1'],'RBT',0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_THIRD_YEAR_SEMSTER_2'],'RBT',0,'L');
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_THIRD_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(3);
// End row
// End third year




// Begin fourth year
//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(0,10,'FOURTH YEAR '.$_SESSION["admissionYear4"],'LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',12);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(95,10,'FIRST SEMESTER','LRT',0,'C');
$pdf->Cell(95,10,'SECOND SEMESTER','LRT',2,'C');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','B',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','B',0,'L');
$pdf->Cell(15.8,6,'CODE','LB',0,'L');
$pdf->Cell(21.9,6,'COURSE','B',0,'L');
$pdf->Cell(13.8,6,'UNIT','B',0,'L');
$pdf->Cell(15.8,6,'SCORES','B',0,'L');
$pdf->Cell(15.8,6,'GRADE','B',0,'L');
$pdf->Cell(11.9,6,'GP','RB',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(206,202,200);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 411','L',0,'L',true);
$pdf->Cell(21.9,6,'Sel Themes in',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL411"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL411grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL411gp"],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 410','L',0,'L',true);
$pdf->Cell(21.9,6,'Intro to Soc.',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL410"],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION["PHIL410grade"],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION["PHIL410gp"],'R',2,'L',true);
$pdf->Ln(0);
// new line for content
$pdf->Cell(15.8,3,'','L',0,'L',true);
$pdf->Cell(21.9,3,'meta',0,0,'L',true);
$pdf->Cell(13.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(11.9,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'','L',0,'L',true);
$pdf->Cell(21.9,3,'',0,0,'L',true);
$pdf->Cell(13.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(15.8,3,'',0,0,'L',true);
$pdf->Cell(11.9,3,'','R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 431','L',0,'L');
$pdf->Cell(21.9,6,'Sel Themes Ethics',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION["PHIL431"],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL431grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL431gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 432','L',0,'L');
$pdf->Cell(21.9,6,'Applied Ethics',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL432'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL432grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL432gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 443','L',0,'L',true);
$pdf->Cell(21.9,6,'Cont. Phil',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL443'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL443grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL443gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 446','L',0,'L',true);
$pdf->Cell(21.9,6,'Analytic Phil',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL446'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL446grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL446gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 441','L',0,'L');
$pdf->Cell(21.9,6,'Exist & Pheno.',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL441'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL441grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL441gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 462','L',0,'L');
$pdf->Cell(21.9,6,'Jurisprudence',0,0,'L');
$pdf->Cell(13.8,6,'2',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL462'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL462grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL462gp'],'R',2,'L');
$pdf->Ln(0);
// End row


//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 445','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil of Law',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL445'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL445grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL445gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'PHIL 464','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil of Hist.',0,0,'L',true);
$pdf->Cell(13.8,6,'2',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL464'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL464grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL464gp'],'R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 447','L',0,'L');
$pdf->Cell(21.9,6,'Phil of Edu.',0,0,'L');
$pdf->Cell(13.8,6,'3',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL447'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL447grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL447gp'],0,0,'L');
$pdf->Cell(15.8,6,'PHIL 468','L',0,'L');
$pdf->Cell(21.9,6,'Project',0,0,'L');
$pdf->Cell(13.8,6,'6',0,0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL468'],0,0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL468grade'],0,0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL468gp'],'R',2,'L');
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 467','L',0,'L',true);
$pdf->Cell(21.9,6,'Phil of Mind',0,0,'L',true);
$pdf->Cell(13.8,6,'3',0,0,'C',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL467'],0,0,'L',true);
$pdf->Cell(15.8,6,$_SESSION['PHIL467grade'],0,0,'L',true);
$pdf->Cell(11.9,6,$_SESSION['PHIL467gp'],0,0,'L',true);
$pdf->Cell(15.8,6,'','L',0,'L',true);
$pdf->Cell(21.9,6,'',0,0,'L',true);
$pdf->Cell(13.8,6,'',0,0,'C',true);
$pdf->Cell(15.8,6,'',0,0,'L',true);
$pdf->Cell(15.8,6,'',0,0,'L',true);
$pdf->Cell(11.9,6,'','R',2,'L',true);
$pdf->Ln(0);
// End row

//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(15.8,6,'PHIL 457','LB',0,'L');
$pdf->Cell(21.9,6,'Phil of Anthro','B',0,'L');
$pdf->Cell(13.8,6,'3','B',0,'C');
$pdf->Cell(15.8,6,$_SESSION['PHIL457'],'B',0,'L');
$pdf->Cell(15.8,6,$_SESSION['PHIL457grade'],'B',0,'L');
$pdf->Cell(11.9,6,$_SESSION['PHIL457gp'],'B',0,'L');
$pdf->Cell(15.8,6,'','LB',0,'L');
$pdf->Cell(21.9,6,'','B',0,'L');
$pdf->Cell(13.8,6,'','B',0,'C');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(15.8,6,'','B',0,'L');
$pdf->Cell(11.9,6,'','RB',2,'L');
$pdf->Ln(1);
// End row


// Section for TOTAL CU, TOTAL GP, SEMESTER GPA
//Begin row
$pdf->SetFont('Arial','',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL CU','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['TOTAL_CU_FOURTH_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_1'],'RBT',0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'TOTAL GP','LBT',0,'L');
$pdf->Cell(20.5,6,$_SESSION['TOTAL_GP_FOURTH_YEAR_SEMSTER_2'],'RBT',0,'L');
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(0);
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_1'],'RBT',0,'L',true);
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(34.5,6,'SEMESTER GPA','LBT',0,'L',true);
$pdf->Cell(20.5,6,$_SESSION['SEMESTER_GPA_FOURTH_YEAR_SEMSTER_2'],'RBT',0,'L',true);
$pdf->Cell(40.5,6,'',0,2,'L');
$pdf->Ln(10);
// End row
// End fourth year


// Begin of summary
//Begin row
$pdf->SetFont('Arial','B',9);
// Cell, Length, Height, Cell content, Border(if 1 = YES, if 0 = NO. Line position: 'LRTB' Left,Right,Top.Bottom), Next line(if 0 = NO, if 2 = YES), Alighment('L' or 'C' or 'R')
$pdf->Cell(47.5,6,'TOTAL: 159','LTB',0,'L');
$pdf->Cell(47.5,6,'TOTAL GP: '.$_SESSION['finaltotalGP'],'TB',0,'L');
$pdf->Cell(47.5,6,'TOTAL CGPA: '.$_SESSION['finaltotalCGPA'],'TB',0,'L');
$pdf->Cell(47.5,6,'CLASSIFICATION: '.$_SESSION['_classification'],'RTB',2,'L');
$pdf->Ln(2);
$pdf->Cell(47.5,6,'All Core Courses Cleared YES/NO',0,2,'L');
$pdf->Ln(1);
$pdf->Cell(47.5,6,'All Core Courses Cleared YES/NO',0,2,'L');
$pdf->Ln(4);
$pdf->Cell(0,6,'Classification...............................................................................................................................................................',0,2,'C');
$pdf->Ln(5);
$pdf->Cell(0,6,'Verified By.......................................................................... Signature......................................................................',0,2,'C');
$pdf->Ln(5);
$pdf->Cell(0,6,"HOD'S NAME..................................................................... Signature......................................................................",0,2,'C');
$pdf->Ln(5);
// End row

// Download transcript to the local machine     
$pdf->Output($_SESSION["studentName"].' '.$_SESSION["matricNumber"].'.pdf', 'D');


?>