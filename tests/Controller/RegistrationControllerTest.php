<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Entity\Trick;
use App\Security\EmailVerifier;
use PHPUnit\Framework\TestCase;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\RegistrationController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationControllerTest extends TestCase
{

    public function testItWorks(): void
    {
        self::assertEquals(42, 42);
    }

    // function to test that when a user is instanciated, there is no error
    public function testUserIsInstanciated(): void
    {
        $user = new User();
        self::assertInstanceOf(User::class, $user);
    }

    public function testTrickIsInstanciated(): void
    {
        $user = new Trick();
        self::assertInstanceOf(Trick::class, $user);
    }

}
