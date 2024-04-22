<?php

namespace App\Controller;
use DOMDocument;
use DOMXPath;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class PosologieController extends AbstractController
{
    public function posologie(): Response
    {
        $url = "https://dmp.sante.gov.ma/recherche-medicaments";
        $html = file_get_contents($url);

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);
        libxml_use_internal_errors(false);

        $xpath = new DOMXPath($doc);
        $links = $xpath->query("//a");

        $data = [];
        foreach ($links as $link) {
            $data[] = $link->getAttribute('href');
        }

        return $this->render('default/posologie.html.twig', [
            'links' => $data,
        ]);
    }
}