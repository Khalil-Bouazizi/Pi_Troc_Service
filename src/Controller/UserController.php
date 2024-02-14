<?php

namespace App\Controller;

use App\Form\UserModifyType;
use App\Form\UserType;
use App\Services\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserAddType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class UserController extends AbstractController
{
    private UserPasswordHasherInterface $hasher;
    private Mailer $mailer ;

    public function __construct(UserPasswordHasherInterface $hasher,Mailer $mailer)
    {
        $this->hasher = $hasher;
        $this->mailer = $mailer ;
    }

    // add user signup
    #[Route('/user/new', name: 'new_user')]
    public function addUser(Request $request, UserRepository $userRepository,Mailer $mailer): Response
    {
        $user = new User();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserAddType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $newUser = new User();
            $newUser->setNom($user->getNom());
            $newUser->setPrenom($user->getPrenom());
            $newUser->setMail($user->getMail());
            $this->mailer->sendMail($user->getMail());
            $newUser->setTel($user->getTel());
            $newUser->setGender($user->getGender());
            $newUser->setAge($user->getAge());
            $newUser->setDateBirthday($user->getDateBirthday());
            $password = $user->getPassword();
            $confirmPassword = $user->getConfirmpassword();
            if ($password === $confirmPassword) {
                $hashedPassword1 = $this->hasher->hashPassword(
                    $newUser,
                    $password
                );
                $hashedPassword2 = $this->hasher->hashPassword(
                    $newUser,
                    $confirmPassword
                );
                $newUser->setPassword($hashedPassword1);
                $newUser->setConfirmpassword($hashedPassword2);
                $entityManager->persist($newUser);
                $entityManager->flush();
                $this->addFlash('success','Check You Mail For Verification');
                return $this->redirectToRoute('new_user');
            }
        }
        return $this->render('RegisterUser.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // route to user settings(back) display function back
    #[Route('/user_display', name: 'user_display')]
    public function user_back() : Response
    {
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $users = $userRepository->findAll();
        return $this->render('user_display_back.html.twig', [
            'user' => $users,
        ]);
    }

    // route to back
    #[Route('/back', name: 'back')]
    public function back() : Response
    {
        return $this->render('back.html.twig');
    }

    //delete user
    #[Route('user/delete/{id}', name: 'user_delete')]
    public function user_delete($id, EntityManagerInterface $entityManager): Response
    {
        if(!$id) {
            throw $this->createNotFoundException('No ID found');
        }
        $user = $entityManager->getRepository(User::class)->find($id);
        if($user != null) {
            $entityManager->remove($user);
            $entityManager->flush();
        }
        return $this->redirectToRoute('user_display');
    }

    //modify user

    //forgot password user on login page
    #[Route('/user/forgotpassword', name: 'user_password_forgot')]
    public function forgotPassword(Request $request): Response
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mail = $form->get('mail')->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneBy(['mail' => $mail]);
            if ($user) {
                $this->addFlash('success', 'Check your email for password reset instructions.');
            } else {
                $this->addFlash('error', 'Invalid email address.');
            }

            return $this->redirectToRoute('user_password_forgot');
        }

        return $this->render('user_forgot_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/user/modify', name: 'user_modify')]
    public function modifyUser(Request $request): Response
    {
        $current_user = $this->getUser();
        $user = new User();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserModifyType::class);
        $form->handleRequest($request);
        return $this->render('HomeOn.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/{id}', name: 'user_show_details')]
    public function show_detail(UserRepository $repository, $id) : Response
    {
        $user = $repository->find($id);
        return $this->render('user_display_front.html.twig',[
            'user' => $user,
        ]);
    }
}