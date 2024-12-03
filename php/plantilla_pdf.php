<?php
require('../fpdf/fpdf.php');

// Crear la clase PDF heredando de FPDF
class PDF extends FPDF
{
    // Definir la cabecera largo de 190 maximo
    function Header()
    {
        // Logo (ajusta la ruta del archivo de tu logo)
        $this->Image('../imagenes/logo.png', 10, 8, 25); // Posición: 10 mm a la derecha y 8 mm hacia abajo, ancho de 30 mm

        // Establecer fuente para el nombre de la empresa (grande y formal)
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(33, 37, 41); // Color del texto en tonos oscuros

        // Movernos a la derecha (ajustar la posición del nombre de la empresa)
        $this->Ln(15);
        $this->Cell(140); // Desplazar 70 mm desde el borde izquierdo

        // Nombre de la empresa
        $this->Cell(50, 10, 'Optica Vista Clara', 0, 1, 'C'); // Centrar el nombre

        // Línea separadora
        $this->SetDrawColor(0, 0, 0); // Color negro para la línea
        $this->SetLineWidth(0.5); // Grosor de la línea
        $this->Line(10, 35, 200, 35); // Dibujar una línea horizontal debajo del logo y nombre

        // Espacio antes del título

        // Título "Citas Programadas"
        $this->SetFont('Arial', 'B', 20); // Título en fuente grande y negrita
        $this->SetTextColor(21, 30, 45); // Color azul para el título
        $this->Cell(190, 10, 'TABLA DE CITAS', 0, 1, 'C'); // Título centrado

        // Línea separadora
        $this->SetDrawColor(0, 0, 0); // Color negro para la línea
        $this->SetLineWidth(0.5); // Grosor de la línea
        $this->Line(10, 45, 200, 45); // Dibujar una línea horizontal debajo del logo y nombre
        // Espacio entre encabezado y contenido
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Establecer fuente para el pie de página
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(128, 128, 128); // Color gris claro para el pie de página
        // Número de página
        $this->Cell(0, 10, utf8_decode("Página") . $this->PageNo(), 0, 0, 'C');
    }
    // Función para calcular la altura de las celdas
    function Row($data, $widths)
    {
        // Calculamos la altura de la fila en base a la celda más alta
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->NbLines($widths[$i], $data[$i]));
        }
        $h = 6 * $nb;

        // Hacemos salto de página si es necesario
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }

        // Dibujamos las celdas
        for ($i = 0; $i < count($data); $i++) {
            $w = $widths[$i];
            $x = $this->GetX();
            $y = $this->GetY();
            // Dibujar el borde de la celda
            $this->Rect($x, $y, $w, $h);
            // Texto de la celda
            $this->MultiCell($w, 6, utf8_decode($data[$i]), 0, 'L');
            // Mover posición a la derecha
            $this->SetXY($x + $w, $y);
        }
        // Mover la posición a la siguiente línea
        $this->Ln($h);
    }

    // Función para calcular el número de líneas que ocupará una celda
    function NbLines($w, $txt)
    {
        // Calculamos el número de líneas que usará una celda
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") {
            $nb--;
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
            }
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }
                } else {
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }
        }
        return $nl;
    }

    // Función para generar la tabla
    function TablaCitas($header, $data)
    {
        // Anchos de las columnas
        $widths = array(60, 30, 30, 70); // Anchos de cada columna

        // Encabezados de la tabla
        $this->SetFillColor(21, 30, 45);
        $this->SetTextColor(255);
        $this->SetFont('Arial', 'B', 10);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->Ln();

        // Restaurar colores y fuente para el cuerpo de la tabla
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 10);

        // Datos de la tabla
        $fill = false;
        foreach ($data as $row) {
            $this->Row($row, $widths);
        }
    }
}
