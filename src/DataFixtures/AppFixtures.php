<?php

namespace App\DataFixtures;

use App\Entity\ImageLink;
use App\Entity\Trick;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $trick = new Trick();
        // $trick->setName('Ollie');
        // $trick->setDescription('The easiest trick');
        // $trick->setTrickgroup('Beginner');
        // $trick->setImageLink('https://snowboardingprofiles.com/wp-content/uploads/2015/07/how-to-do-an-ollie-on-a-snowboard.jpg');
        // $trick->setVideoLink('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        
        // $manager->persist($trick);
        // $manager->flush();


        $second = new Trick();
        $second->setName('Melon');
        $second->setDescription('Grab Your board in the air !');
        $second->setTrickgroup('Beginner');
        $firstImageLink = new ImageLink();
        $firstImageLink->setContent("https://www.nautiljon.com/images/galerie/04/80/monster_333408.jpg");
        $second->addImageLink($firstImageLink);
        $second->setVideoLink('https://www.youtube.com/watch?v=MAj_pzqmC4o');
        $second->setImageLink('');


        $manager->persist($second);
        $manager->flush();
    }
}
