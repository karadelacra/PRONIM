<?php

include ("datos.php");
include ("conexion.php");
require('fpdf.php');


header('Content-Type: text/html; charset=utf-8');


class PDF extends FPDF{
// Cabecera de p�gina
function Header()
{
	// Logo
    $this->Image('logo.png', 10, 8, 90);
    // Times bold 15
    $this->SetFont('Arial', 'B', 15);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    //$this->Cell(80, 10, 'Título de la página', 1, 0, 'C');
    // Separación de columnas
    $this->Cell(10);
    // Línea vertical separadora
    $this->SetDrawColor(0, 0, 0); // Color de línea (negro)
    $this->SetLineWidth(0.4); // Grosor de línea
    $this->Line(110, 10, 110, 30); // Posiciones de la línea vertical
    // Texto en la segunda columna
    // Texto en negrita
    $this->SetFont('Arial', 'B', 12); // Establecer la fuente en negrita
    $this->SetXY(115, 10); // Posicionar el cursor de texto
    $texto = "Registro de Datos Generales de alumnos\nde Nuevo ingreso (2024)";
    $this->MultiCell(0, 5, $texto, 0, 'L');
    //Texto no en negrita
    $this->SetFont('Arial', '', 9); // Establecer la fuente
    $this->SetXY(115, 20); // Posicionar el cursor de texto
    $this->MultiCell(0, 5, 'DECLARO QUE LOS DATOS QUE APARECEN EN ESTE DOCUMENTO SE AJUSTAN A LA REALIDAD', 0, 'L');
    // Salto de línea
    $this->Ln(5);
}

function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Times italic 8
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
}

// Contenido de la sección 1
function Section1Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

	// Obtener posición actual para el cuadro del subtítulo
	$posX = $this->GetX();
	$posY = $this->GetY();

	// Subtítulo en un cuadro ajustado al ancho del subtítulo
	$this->SetFont('Times', 'B', 12);
	$title = 'Identidad';
	$titleWidth = $this->GetStringWidth($title);

	$this->Line($posX, $posY, $posX + $titleWidth + 10, $posY); // Línea de separación antes del cuadro

	// Calcular posición X para centrar el cuadro del subtítulo
	$centerX = ($this->GetPageWidth() - $titleWidth - 10) / 2;
	$this->SetX($centerX);
	$this->SetFillColor(200, 220, 255);
	$this->SetDrawColor(0, 0, 0);
	$this->Cell($titleWidth + 10, 10, $title, 1, 1, 'C', true);

	// Contenido de la sección Identidad
    $this->SetFont('Times', 'B', 12);
    $this->Cell(63, 10,"Apellido Paterno:", 0, 0,'L');
    $this->Cell(63, 10,'Apellido Materno:', 0, 0,'L');
    $this->Cell(46, 10,'Nombre(s):', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(60, 10, "$apellidoP", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(60, 10, "$apellidoM", 1, 0, 'L', true);
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(55, 10, "$nombre", 1, 0, 'L', true);
    $this->Cell(40, 10, '', 0, 1, 'L');
    $this->Cell(0, 3, '', 0, 1, 'L'); // Agregar espacio en blanco para las otras columnas
    
    $this->SetFont('Times', 'B', 12);
    $this->Cell(40, 10,'Boleta:', 0, 0,'L');
    $this->Cell(53, 10,'Fecha de Nacimiento:', 0, 0,'L');
    $this->Cell(57, 10,'CURP:', 0, 0,'L');
    $this->Cell(48, 10,'Genero:', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(37, 10, "$noBoleta", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(50, 10, "$fechaNacimiento", 1, 0, 'L', true);
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(56, 10, "$curp", 1, 0, 'L', true);
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(30, 10, "$genero", 1, 1, 'L', true);
    $this->Cell(0, 3, '', 0, 1, 'L');

    $this->SetFont('Times', 'B', 12);
    $this->Cell(53, 10,'Discapacidad:', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(100, 10, "$discapacidad", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(0, 5, '', 0, 1, 'L');

    $this->Ln(10);
}

// Contenido de la sección 2
function Section2Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

	// Obtener posición actual para el cuadro del subtítulo
	$posX = $this->GetX();
	$posY = $this->GetY();

	// Subtítulo en un cuadro ajustado al ancho del subtítulo
	$this->SetFont('Times', 'B', 12);
	$title = 'Contacto';
	$titleWidth = $this->GetStringWidth($title);

	$this->Line($posX, $posY, $posX + $titleWidth + 10, $posY); // Línea de separación antes del cuadro

	// Calcular posición X para centrar el cuadro del subtítulo
	$centerX = ($this->GetPageWidth() - $titleWidth - 10) / 2;
	$this->SetX($centerX);
	$this->SetFillColor(200, 220, 255);
	$this->SetDrawColor(0, 0, 0);
	$this->Cell($titleWidth + 10, 10, $title, 1, 1, 'C', true);

	// Contenido aleatorio de la sección 2
	$this->SetFont('Times', 'B', 12);
    $this->Cell(63, 10,utf8_decode('Calle y Número:'), 0, 0,'L');
    $this->Cell(63, 10,'Colonia:', 0, 0,'L');
    $this->Cell(46, 10,utf8_decode('Alcaldía'), 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(60, 10, "$calle", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(60, 10, "$colonia", 1, 0, 'L', true);
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(55, 10, "$alcaldia", 1, 0, 'L', true);
    $this->Cell(40, 10, '', 0, 1, 'L');
    $this->Cell(0, 3, '', 0, 1, 'L'); // Agregar espacio en blanco para las otras columnas
    
    $this->SetFont('Times', 'B', 12);
    $this->Cell(63, 10,utf8_decode('Código Postal:'), 0, 0,'L');
    $this->Cell(63, 10,utf8_decode('Teléfono'), 0, 0,'L');
    $this->Cell(46, 10,'Correo:', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(60, 10, "$codigo", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(60, 10, "$telefono", 1, 0, 'L', true);
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(55, 10, "$email", 1, 0, 'L', true);
    $this->Cell(40, 10, '', 0, 1, 'L');
    $this->Cell(0, 5, '', 0, 1, 'L');
}

// Contenido de la sección 3
function Section3Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

	// Obtener posición actual para el cuadro del subtítulo
	$posX = $this->GetX();
	$posY = $this->GetY();

	// Subtítulo en un cuadro ajustado al ancho del subtítulo
	$this->SetFont('Times', 'B', 12);
	$title = 'Procedencia';
	$titleWidth = $this->GetStringWidth($title);

	$this->Line($posX, $posY, $posX + $titleWidth + 10, $posY); // Línea de separación antes del cuadro

	// Calcular posición X para centrar el cuadro del subtítulo
	$centerX = ($this->GetPageWidth() - $titleWidth - 10) / 2;
	$this->SetX($centerX);
	$this->SetFillColor(200, 220, 255);
	$this->SetDrawColor(0, 0, 0);
	$this->Cell($titleWidth + 10, 10, $title, 1, 1, 'C', true);

	// Contenido aleatorio de la sección 2
	$this->SetFont('Times', 'B', 12);
    $this->Cell(92, 10,'Escuela de Procedencia:', 0, 0,'L');
    $this->Cell(63, 10,'Estado de Procedencia:', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(90, 10, "$escuelab", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(90, 10, "$entidad", 1, 0, 'L', true);
    $this->Cell(40, 10, '', 0, 1, 'L');
    $this->Cell(0, 3, '', 0, 1, 'L'); // Agregar espacio en blanco para las otras columnas
    
    $this->SetFont('Times', 'B', 12);
    $this->Cell(63, 10,'Promedio:', 0, 0,'L');
    $this->Cell(63, 10,'ESCOM fue tu:', 0, 1,'L');

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->SetFont('Times', '', 12);
    $this->Cell(60, 10, "$promedio", 1, 0, 'L', true); // Recuadro que encierra 
    $this->Cell(3, 10, '', 0, 0, 'L');
    $this->Cell(55, 10, "$opcion", 1, 0, 'L', true);
    $this->Cell(40, 10, '', 0, 1, 'L');
    $this->Cell(0, 5, '', 0, 1, 'L');
}
// Contenido de la sección 4
function Section4Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

    $this->SetFillColor(255, 255, 255); 
    $this->SetDrawColor(0, 0, 0); 
    $this->Cell(0, 5, '', 0, 1, 'L');
    $this->Cell(68, 10, '', 0, 0, 'L');
    $this->Cell(60, 27, '', 1, 1, 'L', true); // Recuadro que encierra 
    $this->Cell(78, 10, '', 0, 0, 'L');
    $this->Cell(5, 8, 'Firma del Estudiante', 0, 1, 'L');
    $this->Cell(0, 5, '', 0, 1, 'L'); // Agregar espacio en blanco para las otras columnas
	
}

// Contenido de la sección 5 pagina 2
function Section5Content($ficha, $curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

	// Obtener posición actual para el cuadro del subtítulo
	$posX = $this->GetX();
	$posY = $this->GetY();

	// Subtítulo en un cuadro ajustado al ancho del subtítulo
	$this->SetFont('Times', 'B', 12);
	$title = 'FICHA DE EXAMEN';
	$titleWidth = $this->GetStringWidth($title);

	$this->Line($posX, $posY, $posX + $titleWidth + 10, $posY); // Línea de separación antes del cuadro

	// Calcular posición X para centrar el cuadro del subtítulo
	$centerX = ($this->GetPageWidth() - $titleWidth - 10) / 2;
	$this->SetX($centerX);
	$this->SetFillColor(200, 220, 255);
	$this->SetDrawColor(0, 0, 0);
	$this->Cell($titleWidth + 10, 10, $title, 1, 1, 'C', true);
    $this->Cell(0, 5, '', 0, 1, 'L');

    $this->SetFont('Times', 'B', 12);
    $this->Cell(50, 5, 'CICLO ESCOLAR 2024', 0, 1, 'L');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 5, 'SEMESTRE ENERO', 0, 1, 'L');

    $this->SetFont('Times', 'B', 12);
    $this->Cell(48, 0, '', 0, 0, 'L');
    $this->Cell(19, 10,'Ficha:', 0, 0,'C');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 10,"$ficha", 0, 1, 'C'); //ID o NUMERO DE ALUMNO EN BD
    $this->SetFont('Times', 'B', 12);
    $this->Cell(50, 0, '', 0, 0, 'L');
    $this->Cell(20, 10,'Alumno:', 0, 0,'C');
    $this->SetFont('Times', '', 12);
    $Nombre = "$nombre";
    $ApellidoP = "$apellidoP";
    $ApellidoM = "$apellidoM";
    $NombreAlumno = $ApellidoP . " " . $ApellidoM . " " . $Nombre;
    $this->Cell(80, 10, utf8_decode($NombreAlumno), 0, 1, 'C');
    $this->SetFont('Times', 'B', 12);
    $this->Cell(54, 0, '', 0, 0, 'L');
    $this->Cell(8, 10,'CURP:', 0, 0,'C');
    $this->SetFont('Times', '', 12);
    $CURP = "$curp";
    $this->Cell(100, 10, $CURP, 0, 1, 'C');
	
}


// Contenido de la sección 6 pagina 2
function Section6Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero) {
	// Dibujar línea de separación arriba del contenido
	$this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY());

	// Obtener posición actual para el cuadro del subtítulo
	$posX = $this->GetX();
	$posY = $this->GetY();

	// Subtítulo en un cuadro ajustado al ancho del subtítulo
	$this->SetFont('Times', 'B', 12);
	$title = 'LUGAR DE EXAMEN';
	$titleWidth = $this->GetStringWidth($title);

	$this->Line($posX, $posY, $posX + $titleWidth + 10, $posY); // Línea de separación antes del cuadro

	// Calcular posición X para centrar el cuadro del subtítulo
	$centerX = ($this->GetPageWidth() - $titleWidth - 10) / 2;
	$this->SetX($centerX);
	$this->SetFillColor(200, 220, 255);
	$this->SetDrawColor(0, 0, 0);
	$this->Cell($titleWidth + 10, 10, $title, 1, 1, 'C', true);
    $this->Cell(0, 5, '', 0, 1, 'L');

    $this->SetFont('Times', '', 12);

    $this->SetFont('Times', 'B', 12);
    $this->Cell(45, 5,utf8_decode('Día para el examen:'), 0, 0,'L');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 5,'Lunes 12 de febrero de 2024', 0, 1, 'L');
    $this->SetFont('Times', 'B', 12);
    $this->Cell(45, 5,'Puerta de Acceso:', 0, 0,'L');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 5,utf8_decode('Metro Politécnico Sendero seguro'), 0, 1, 'L');
    $this->SetFont('Times', 'B', 12);
    $this->Cell(45, 5,'Horario:', 0, 0,'L');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 5,"$horario", 0, 1, 'L');
    $this->SetFont('Times', 'B', 12);
    $this->Cell(45, 5,'Laboratorio:', 0, 0,'L');
    $this->SetFont('Times', '', 12);
    $this->Cell(50, 5,"$salon", 0, 1, 'L');
    

    $this->SetFont('Times', 'B', 12);
    $this->SetFillColor(255, 229, 204); 
    $this->SetDrawColor(0, 0, 0); 
    $this->Cell(0, 10, '', 0, 1, 'L');
    $this->Cell(40, 10, '', 0, 0, 'L');
    $this->Cell(125, 8, utf8_decode('FICHA VÁLIDA SOLO PARA EL DÍA Y HORARIO SEÑALADO'), 1, 1, 'L', true); // Recuadro que encierra 
    
	
}



function ChapterBody($file)
{
    // Leemos el fichero
    $txt = file_get_contents($file);
    $txt = utf8_decode($txt);
    // Times 12
    $this->SetFont('Times','',10);
    // Imprimimos el texto justificado
    $this->MultiCell(0,5,$txt);
    // Salto de línea
    $this->Ln();
}

// Contenido de la sección 7 pagina 2

function Section7Content($file) {

    $this->Cell(0, 5, '', 0, 1, 'L');

    $this->SetFont('Times', 'B', 10);
    $this->Cell(45, 15, 'Instrucciones:', 0, 1, 'L');
    $this->ChapterBody($file);
}
}


// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();

// Contenido de las secciones
$pdf->Section1Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero,);
$pdf->Section2Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero);
$pdf->Section3Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero);
$pdf->Section4Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero);
$pdf->Section5Content($ficha,$curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero);
$pdf->Section6Content($curp,$noBoleta,$fechaNacimiento,$nombre,$apellidoP,$apellidoM,$telefono,$email ,$escuelab ,$entidad,$promedio,$discapacidad,$opcion,$salon,$horario,$codigo,$alcaldia,$colonia,$calle,$genero);
$pdf->Section7Content('Instrucciones.txt');

$pdf->Output();


?>
