<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AdminController
{
    #[Route('/inscription.html')]
    public function  register(): Response
    {
       return $this->register();
    }

}