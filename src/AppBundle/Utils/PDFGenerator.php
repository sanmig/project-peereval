<?php 
namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* PDF Generator code
* Use this code inside the controller
*/
class PDFGenerator
{
	
	public function generatePDF($html)
	{	
		//render a view and store it
		//$html = $this->renderView('default/homepage.html.twig');
		
		//get pdf generator service
		$pdfGenerator = $this->get('spraed.pdf.generator');

		//turn the page as pdf
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