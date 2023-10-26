<?php

require('fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {


      $this->SetTextColor(0, 0, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("ALMOHADAS  "), 0, 1, 'C', 0);
      $this->Ln(7);
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(1); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE VENTAS EN ALMOHADAS  "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(0,0,0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(0,0,0); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Nombre '), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Fecha creacion'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Fecha entrega'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Total'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
   $cont = 1;
   foreach($ventas as $venta):
      $pdf->Cell(10, 10, utf8_decode($cont), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->nombre), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->fecha_creacion), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->fecha_entrega), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->total), 1, 1, 'C', 0);                      
   $cont++;
   endforeach;

$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
