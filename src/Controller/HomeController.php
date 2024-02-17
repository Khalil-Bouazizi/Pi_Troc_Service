<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{
    // route url kif ybda user mzel m3mlch login esmha home_off
    #[Route('/home_off', name: 'homeOff')]
    public function homeoff(): Response
    {
        return $this->render('home.html.twig');
    }
    // this route will render when the user login successfully ;)
    #[Route('/', name: 'homeOn')]
    public function homeOn(): Response
    {
        $user = $this->getUser();
        if (!$user)
        {
            return $this->redirectToRoute('app_login');
        }
        else
        {
            if($user->getStatus() == "inactive")
            {
                $this->addFlash('failed','User Account not already activated');
                return $this->redirectToRoute('app_login');
            }
        }
        return $this->render('homeOn.html.twig');
    }
}