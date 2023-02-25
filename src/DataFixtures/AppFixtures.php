<?php

namespace App\DataFixtures;

// use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Trick;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $trick = new Trick();
        $trick->setName('Ollie');
        $trick->setDescription('The easiest trick');
        $trick->setTrickgroup('Beginner');
        $trick->setImageLink('https://snowboardingprofiles.com/wp-content/uploads/2015/07/how-to-do-an-ollie-on-a-snowboard.jpg');
        $trick->setVideoLink('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        
        $manager->persist($trick);



        $trickdos = new Trick();
        $trickdos->setName('Melon');
        $trickdos->setDescription('Grab Your board in the air !');
        $trickdos->setTrickgroup('Beginner');
        $trickdos->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickdos->setVideoLink('https://www.youtube.com/watch?v=MAj_pzqmC4o');
        
        $manager->persist($trickdos);



        $tricktres = new Trick();
        $tricktres->setName('Relay');
        $tricktres->setDescription('example three !');
        $tricktres->setTrickgroup('Beginner');
        $tricktres->setImageLink('https://media.istockphoto.com/id/165635215/vector/snowboarder-jumping.jpg?s=612x612&w=0&k=20&c=QbAL8KNH6Y4q-MxAmlQKTpJsoGghZVYdeGZrw9msgeM=');
        $tricktres->setVideoLink('https://www.youtube.com/watch?v=P7NeerMfLq0');
        
        $manager->persist($tricktres);


        $tricktres = new Trick();
        $tricktres->setName('Jack');
        $tricktres->setDescription('example four !');
        $tricktres->setTrickgroup('Medium');
        $tricktres->setImageLink('https://media.istockphoto.com/id/165635215/vector/snowboarder-jumping.jpg?s=612x612&w=0&k=20&c=QbAL8KNH6Y4q-MxAmlQKTpJsoGghZVYdeGZrw9msgeM=');
        $tricktres->setVideoLink('https://www.youtube.com/watch?v=sl65sMSWrpY');
        
        $manager->persist($tricktres);



        $trickfour = new Trick();
        $trickfour->setName('Stalefish');
        $trickfour->setDescription('Stalefish is a trick that involves grabbing the heel edge of the board with the rear hand while the front leg is extended straight out.');
        $trickfour->setTrickgroup('Intermediate');
        $trickfour->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Tricks-Stalefish-Grab-620x393.jpg');
        $trickfour->setVideoLink('https://www.youtube.com/watch?v=oYkGZ3H6FNw');

        $manager->persist($trickfour);

        $trickfive = new Trick();
        $trickfive->setName('Tail Grab');
        $trickfive->setDescription('Tail Grab is a trick that involves grabbing the tail of the snowboard with the rear hand.');
        $trickfive->setTrickgroup('Beginner');
        $trickfive->setImageLink('https://thumbs.dreamstime.com/b/snowboarder-performing-tail-grab-snowboarder-performing-tail-grab-mountains-129820259.jpg');
        $trickfive->setVideoLink('https://www.youtube.com/watch?v=lunYxCQrs1E');

        $manager->persist($trickfive);


        $tricksix = new Trick();
        $tricksix->setName('Method Grab');
        $tricksix->setDescription('Method Grab is a trick that involves grabbing the heel edge of the board with the rear hand while the front leg is bent and the rear leg is extended.');
        $tricksix->setTrickgroup('Intermediate');
        $tricksix->setImageLink('https://miro.medium.com/max/1200/1*vV1tWalQFCyMhMPsSFwthA.jpeg');
        $tricksix->setVideoLink('https://www.youtube.com/watch?v=lunYxCQrs1E');

        $manager->persist($tricksix);


        $trickseven = new Trick();
        $trickseven->setName('Frontside 180');
        $trickseven->setDescription('Frontside 180 is a trick that involves rotating the b  oard 180 degrees in a frontside direction while in the air.');
        $trickseven->setTrickgroup('Intermediate');
        $trickseven->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2013/09/FS180.jpg');
        $trickseven->setVideoLink('https://www.youtube.com/watch?v=ENalkvktYAI');
        
        $manager->persist($trickseven);


        $trickeight = new Trick();
        $trickeight->setName('Backside Boardslide');
        $trickeight->setDescription('Backside Boardslide is a trick that involves sliding the board along a rail or box with the backside of the board facing the obstacle.');
        $trickeight->setTrickgroup('Advanced');
        $trickeight->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2011/11/Whitelines-95-gap-to-fronslide-boardslide.jpg');
        $trickeight->setVideoLink('https://www.youtube.com/watch?v=R3OG9rNDIcs');
        
        $manager->persist($trickeight);


        $tricknine = new Trick();
        $tricknine->setName('Frontside Boardslide');
        $tricknine->setDescription('Frontside Boardslide is a trick that involves sliding the board along a rail or box with the frontside of the board facing the obstacle.');
        $tricknine->setTrickgroup('Intermediate');
        $tricknine->setImageLink('https://miro.medium.com/max/1156/1*6zaXI7Gk_5DM4wpKWvSjCw.jpeg');
        $tricknine->setVideoLink('https://www.youtube.com/watch?v=WRjNFodnOHk');

        $manager->persist($tricknine);




        $manager->flush();
    }
}
