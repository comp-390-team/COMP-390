<?php
require('../../../../Database/DB.php');
require('../../../../pigs/Reports/Report.php');

require('../../../../externalLibrary/fpdf181/fpdf.php');

$report =new Report();



class PDF extends FPDF{

function mainTitle($author, $date){
	global $title;
  $this->AddPage();
  $this->SetMargins(0,0,0,0);

	// Arial bold 15
	$this->SetFont('Arial','BU',28);
	// Calculate width of title and position
	$w = $this->GetStringWidth($title)+6;
	$this->SetX(0);
  $this->SetY(0);
	// Colors of frame, background and text
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(32,108,73);
	$this->SetTextColor(220,150,50);
	// Thickness of frame (1 mm)
	// $this->SetLineWidth(1);

	// Title
  $this->cell(0, 20,"",0,1,'C',true);
  // $this->Ln();

	$this->MultiCell(0,15,strtoupper($title),0,'C',true);
  $this->SetFont('Arial','BU',28);

  $this->SetY(216);
  $this->SetFont('Arial','',15);
  $this->SetTextColor(255, 255, 255);
  $this->SetFillColor(79,94,87);



  $info="\tPrepared by:  $author\n\tDate     :  $date";

  $this->MultiCell(100,30,$info,0,1,'LT',true);

	// Line break
	// $this->Ln(10);
}

function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-20.3);
  $this->SetX(0);

	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
	$this->Cell(0, 20.7,'Page '.$this->PageNo(),0,1,'C', true);
}

function ChapterTitle($num, $label)
{
	// Arial 12
	$this->SetFont('Arial','B',20);
	// Background color
	$this->SetFillColor(9,100,87);
  $this->SetTextColor(220,150,50);

	// Title
	$this->Cell(60,20,"Subtitle $num :",0,0,'L',true);

  $this->SetFont('Arial','BU',25);
  $this->SetTextColor(55, 155, 255);
  $this->SetFillColor(255,255,255);
  $this->Cell(0,20," $label",0,1,'C',true);

	// Line break
	$this->Ln(4);
  $this->SetFillColor(255,255,255);
  $this->SetTextColor(0, 0, 0);


}

function ChapterBody($evaluation,$type,$image1,$image2)
{
	// Read text file
	// $txt = file_get_contents($file);
	// Times 12
	$this->SetFont('Times','',16);

  $this->cell(0,8,"Type: $type",0,1,"L");
  $this->SetFont('Times','U',14);


//../..//profiles/images/91805100166.jpg
  $this->Image("images/upload/".$image1.".jpeg",5,60,0,100);
  $this->Image("images/upload/".$image2.".jpeg",110,60);

   // $this->Ln(4);        // unlink("images/upload/".$image1.".png");

  $this->setY(160);
  $this->cell(0,8," Report analysis ",0,1,"C");



  $this->SetFont('Times','',12);

	// Output justified text
	$this->MultiCell(0,5,$evaluation);
	// Line break
	$this->Ln();
}

function PrintChapter($num, $title, $analysis, $type, $image1,$image2)
{ $this->AddPage();
	$this->ChapterTitle($num,$title);
	$this->ChapterBody($analysis,$type,$image1,$image2);
}
}

$pdf = new PDF();

if (isset($_POST['title'])){
  $separator =$_POST['separator'];

  $title     =$_POST['title'];
  $author    =$_POST['author'];

  $images1   =explode($separator, $_POST['screenShot1']);
  $images2   =explode($separator, $_POST['screenShot2']);

  $subtitle  =explode($separator, $_POST['subtitle']);
  $analysis  =explode($separator,$_POST['analysis']);
  $type      =explode($separator,$_POST['type']);

  $pdf->mainTitle($author, date("Y-m-d"));
  $pdf->SetMargins(10,10,10);

  for ($i=0; $i < sizeof($subtitle)-1; $i++) {
       $pdf->PrintChapter($i+1,$subtitle[$i], $analysis[$i] , $type[$i], $images1[$i], $images2[$i]);
  }

  $pdf->Output("generated/".str_replace("/","_",$title).".pdf","F");

	$report->addReport($title,str_replace("/","_",$title).".pdf");

}
?>
