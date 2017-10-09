<?php 
namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
* 
*/
class PDFGenerator
{
	
	public function generatePDF($html)
	{
		$pdfGenerator = $this->get('spraed.pdf.generator');

        return new Response($pdfGenerator->generatePDF($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="out.pdf"'
            )
        );
	}
}
?>