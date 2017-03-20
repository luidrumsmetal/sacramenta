<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a pag

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();
$heading = <<<EOD
<h3>CERTIFICADO DE  BAUTISMO</h3>
<p align="left"><h3>SERIE-B</p></p>
EOD;
$pdf->writeHTMLCell(0, 0,'','',$heading,0,1,0,true,'C',true);
$html = '<p align="left">Parroquia'.$get->parroquia;
$pdf->writeHTMLCell(0, 0,'','',$html,0,1,0,true,'C',true);

$html = '<p align="left">Libro Nro:'.$get->libro.'Pagina:'.$get->partida.'Nro de  Certif:'.$get->orc;
$pdf->writeHTMLCell(0, 0,'','',$html,0,1,0,true,'C',true);
// create some HTML content



$pdf->Ln(8);
$table ='<table style = "border: 1px solid black">';
$table .=  '<tr>
             <th data-field="nombre">Apellido Paterno</th>
             <th data-field="direccion">Apellido Materno</th>
             <th data-field="direccion">Nombres</th>
             <th data-field="direccion">Fecha de Bautizo</th>
             <th data-field="direccion">Genero</th>
           </tr>';
           
               $table .= '<tr>
               			  <td>'.$get->apellidoPaterno.'</td>
               			  <td>'.$get->apellidoMaterno.'</td>
               			  <td>'.$get->nombres.'</td>
               			  <td>'.$get->fecha.'</td>
               			  <td>'.$get->genero.'</td>
               			  <td>';
            
$table .=  '</table>';
$pdf->writeHTMLCell(0, 0,'','',$table,0,1,0,true,'C',true);
       
// output the HTML content


// Print some HTML Cells



$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
ob_flush();
$pdf->Output('example_006.pdf', 'I');
ob_end_flush();
ob_end_clean();
//============================================================+
// END OF FILE
//============================================================+