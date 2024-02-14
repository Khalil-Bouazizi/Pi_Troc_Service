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
        // session : getuser thezlk
        $user = $this->getUser();
        if (!$user)
        {
            // kif yo9res logout traj3k homeOff
            return $this->redirectToRoute('homeOff');
        }

        return $this->render('homeOn.html.twig');

        /*return $this->render('homeOn.html.twig');*/
    }
}