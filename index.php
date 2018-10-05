<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

require_once("fpdf.php");


// Begin configuration

$textColour = array(0, 0, 0);
$headerColour = array(100, 100, 100);
$tableHeaderTopTextColour = array(255, 255, 255);
$tableHeaderTopFillColour = array(125, 152, 179);
$tableHeaderTopProductTextColour = array(0, 0, 0);
$tableHeaderTopProductFillColour = array(143, 173, 204);
$tableHeaderLeftTextColour = array(99, 42, 57);
$tableHeaderLeftFillColour = array(184, 207, 229);
$tableBorderColour = array(50, 50, 50);
$tableRowFillColour = array(213, 170, 170);
$reportName = "2009 Widget Sales Report";
$reportNameYPos = 160;
$logoFile = 'anhcanhan.jpg';
$logoXPos = 151;
$logoYPos = 40;
$logoWidth = 50;
$columnLabels = array("Q1", "Q2", "Q3", "Q4");
$rowLabels = array("SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget");
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Product";
$chartYLabel = "2009 Sales";
$chartYStep = 20000;

$chartColours = array(
    array(255, 100, 100),
    array(100, 255, 100),
    array(100, 100, 255),
    array(255, 255, 100),
);

$data = array(
    array(9940, 10100, 9490, 11730),
    array(19310, 21140, 20560, 22590),
    array(25110, 26260, 25210, 28370),
    array(27650, 24550, 30040, 31980),
);

// End configuration


/**
 * Create the title page
 **/

/** @var FPDF $pdf */
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetTextColor($textColour[0], $textColour[1], $textColour[2]);

/**
 * Create the page header, main heading, and intro text
 **/

$pdf->AddPage();
/**
 * @param $pdf
 * @param $textColour
 * @param $tableRowFillColour
 */
function addHeader($pdf, $textColour, $tableRowFillColour)
{
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->SetTextColor(204, 0, 0);
    $pdf->SetFillColor(255, 148, 77);
    $pdf->Cell(100, 15, "", 0, 0, 'L', true);
    $pdf->SetFillColor(255, 148, 77);
    $pdf->Cell(91, 15, " NGUYEN HONG QUAN", 0, 0, 'L', true);
    $pdf->SetFillColor(255, 148, 77);
    $pdf->Ln(15);
    $pdf->SetTextColor($textColour[0], $textColour[1], $textColour[2]);
    $pdf->SetFont('Arial', '', 15);
    $pdf->Cell(110, 5, "", 0, 0, 'L', true);
    $pdf->Cell(81, 5, "PHP Developer | Teamlead", 0, 0, 'L', true);
    $pdf->Ln(5);
    $pdf->Cell(191, 5, "", 0, 0, 'L', true);
}

$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth);

addHeader($pdf, $textColour, $tableRowFillColour);
/**
 * @param $pdf
 * @param $tableRowFillColour
 */
function addObjective($pdf, $tableRowFillColour)
{
    $pdf->SetFont('Arial', '', 20);
    $text = "To be a good staff. Try to learning as much as possible and doing my best in order to accompish my task. To have good opportunities to get promotion in my job. Develop my skills with development of company, I always want to prove myself";

    $pdf->Ln(5);
    $pdf->SetFillColor(153, 153, 102); // #999966
    $pdf->SetTextColor(255, 255, 255); // #ffffff
    $pdf->SetFont('Arial', '', 15);

    $pdf->Cell(145, 235, "", 0, 0, 'L', true);
    $pdf->Cell(46, 10, "", 0, 0, 'L', true);

    $pdf->Ln(6);
    $pdf->Write(10, "Objective");
    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(140, 6, $text, 0, 'L', false);
    $pdf->Ln(9);
    $pdf->Cell(145, 0, "", 0, 0, 'L', true);
    $pdf->SetFillColor(153, 102, 51);
    $pdf->Cell(46, 180, "", 0, 0, 'L', true);
}

addObjective($pdf, $tableRowFillColour);
$pdf->Ln(12);
/**
 * @param $pdf
 */
function addEducation($pdf)
{
    $pdf->SetFont('Arial', '', 20);
    $pdf->Write(10, "Education");
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(6, "THUYLOI UNIVERSITY AT HA NOI CITY");
    $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(6, "Major: Software Engineering");
}

addEducation($pdf);

$pdf->Ln(12);
$pdf->SetFont('Arial', '', 20);
$pdf->Write(10, "Work Experience");
/**
 * @param $pdf
 */
function addExperience($pdf, $params)
{

    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 20);
    $pdf->Write(10, $params['company']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(10, "                        ");
    $pdf->Write(10, $params['time']);
    $pdf->Ln(10);
    $pdf->Write(10, "Main responsibilities:");
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $vicomageText = $params['context'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(140, 6, $vicomageText, 0, 'L', false);
}

$params = [
    'company' => 'Vicomage',
    'time' => 'May 2018 - October 2018',
    'context' =>  'Working with foreigner customer. At that time, I was a web developer with skills PHP(Laravel Framework), Javascript(Jquery, Knockoutjs), Flatform(Magento 1 + 2), CMS(Wordpress). Here, almost tasks are collecting requirements, discussion with customers, technology suggestions to streamline  the work, develop company\'s idea to market segments to test ideas in real context. Especially, I have chance to study and work with new technologies to achieve possible approachs for product environment. They are really challenge for me but i really enjoy to do them. Js is my programming language\'s favorite. Becoming a JS full stack developer is my desire, I\'m try my best to make it out.'
];

addExperience($pdf, $params);

$pdf->Ln(12);

$pdf->SetFillColor(153, 153, 102); // #999966
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(145, 238, "", 0, 0, 'L', true);

$pdf->SetFillColor(153, 102, 51); // #999966
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(46, 238, "", 0, 0, 'L', true);
$params = [
    'company' => 'Wsoftpro',
    'time' => 'May 2017 - May 2018',
    'context' =>  'Working with foreigner customer. At that time, I was a web developer with skills PHP(Laravel Framework), Javascript(Jquery), CMS(Wordpress), Flatform(Magento 1).'
];

addExperience($pdf, $params);
$pdf->Ln(12);

$params = [
    'company' => 'Osworlds',
    'time' => 'August 2016 - May 2017',
    'context' =>  'Working with foreigner customer. At that time, I was a web developer with skills PHP(Laravel Framework), Javascript(Jquery), CMS(Wordpress), Flatform(Magento 1).'
];

addExperience($pdf, $params);

// Create the left header cell
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor($tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2]);


/***
 * Serve the PDF
 ***/

$pdf->Output("PHP_NguyenHongQuan.pdf", "I");

?>