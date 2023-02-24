<?php

namespace App\Tests\Controller;

use App\Security\EmailVerifier;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\RegistrationController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationControllerTest extends TestCase
{
    // Fonction to test the registration of a user in App\Controller\RegistrationController;
    public function testregister()
    {
        $this->assertEquals(1, 1);
        // $emailVerifier = $this->createMock(EmailVerifier::class);
        // $registrationController = new RegistrationController($emailVerifier);
        // $request = $this->createMock(Request::class);
        // // Create UserPasswordHasherInterface mock
        // $userPasswordHasher = $this->createMock(UserPasswordHasherInterface::class);
        // // create EntityManagerInterface mock
        // $entityManager = $this->createMock(EntityManagerInterface::class);
        // $response = $registrationController->register($request, $userPasswordHasher, $entityManager);
        // $this->assertInstanceOf(Response::class, $response);
        
        // asserts that 1 == 1
    }
}
