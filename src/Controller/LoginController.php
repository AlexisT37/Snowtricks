<?php

namespace App\Controller;

use App\Security\EmailVerifier;
use Symfony\Component\Mime\Address;
use App\Form\EmailForPasswordResetType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    private EmailVerifier $emailVerifier;


    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }


    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    // Function to reset the password of the user
    #[Route('/reset-password', name: 'app_reset_password')]
    public function resetPassword(Request $request): Response
    {
        $form = $this->createForm(EmailForPasswordResetType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('snowtricksalex@gmail.com', 'Admin Mail Bot'))
                    ->to($user->getEmail())
                    ->subject('Reset your password')
                    ->htmlTemplate('login/reset_password.html.twig')
            );
            // do anything else you need here, like send an email

            $this->addFlash('success', 'You should have recieved an email.');

            return $this->redirectToRoute('app_home');
        }
        

        return $this->render('login/reset_password.html.twig', [
            'emailforpasswordform' => $form->createView(),
        ]);
    }
}
