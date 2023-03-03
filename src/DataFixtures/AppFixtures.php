<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Trick;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail('example@example.com');
        $user->setFullname('John Doe');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('password');
        $user->setPhoto('https://static.wikia.nocookie.net/shadowsdietwice/images/d/d1/Withered_Red_Gourd.png');

        $manager->persist($user);
        $manager->flush();


        $trick = new Trick();
        $trick->setName('Ollie');
        $email = 'example@example.com';
        $userRepository = $this->em->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        // dump($user);
        if (!$user) {
            throw new \Exception(sprintf('User with email "%s" not found', $email));
        }
        $trick->setCreator($user);
        $trick->setDescription('The easiest trick');
        $trick->setTrickgroup('Beginner');
        $trick->setImageLink('https://snowboardingprofiles.com/wp-content/uploads/2015/07/how-to-do-an-ollie-on-a-snowboard.jpg');
        $trick->setVideoLink('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trick->setCreatedAt(new DateTimeImmutable());
        $trick->setmodifiedAt(new DateTimeImmutable());
        $trick->setDeleted(0);
        $trick->setDiscussionChannel('empty');
        
        $manager->persist($trick);



        $trickdos = new Trick();
        $trickdos->setName('Melon');
        $trickdos->setCreator($user);
        $trickdos->setDescription('Grab Your board in the air !');
        $trickdos->setTrickgroup('Beginner');
        $trickdos->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickdos->setVideoLink('https://www.youtube.com/watch?v=MAj_pzqmC4o');
        $trickdos->setCreatedAt(new DateTimeImmutable());
        $trickdos->setmodifiedAt(new DateTimeImmutable());
        $trickdos->setDeleted(0);
        $trickdos->setDiscussionChannel('empty');
        
        $manager->persist($trickdos);



        $tricktres = new Trick();
        $tricktres->setName('Relay');
        $tricktres->setCreator($user);
        $tricktres->setDescription('example three !');
        $tricktres->setTrickgroup('Beginner');
        $tricktres->setImageLink('https://media.istockphoto.com/id/165635215/vector/snowboarder-jumping.jpg?s=612x612&w=0&k=20&c=QbAL8KNH6Y4q-MxAmlQKTpJsoGghZVYdeGZrw9msgeM=');
        $tricktres->setVideoLink('https://www.youtube.com/watch?v=P7NeerMfLq0');
        $tricktres->setCreatedAt(new DateTimeImmutable());
        $tricktres->setmodifiedAt(new DateTimeImmutable());
        $tricktres->setDeleted(0);
        $tricktres->setDiscussionChannel('empty');
        
        $manager->persist($tricktres);


        $tricktroispointcinq = new Trick();
        $tricktroispointcinq->setName('Jack');
        $tricktroispointcinq->setCreator($user);
        $tricktroispointcinq->setDescription('example four !');
        $tricktroispointcinq->setTrickgroup('Medium');
        $tricktroispointcinq->setImageLink('https://media.istockphoto.com/id/165635215/vector/snowboarder-jumping.jpg?s=612x612&w=0&k=20&c=QbAL8KNH6Y4q-MxAmlQKTpJsoGghZVYdeGZrw9msgeM=');
        $tricktroispointcinq->setVideoLink('https://www.youtube.com/watch?v=sl65sMSWrpY');
        $tricktroispointcinq->setCreatedAt(new DateTimeImmutable());
        $tricktroispointcinq->setmodifiedAt(new DateTimeImmutable());
        $tricktroispointcinq->setDeleted(0);
        $tricktroispointcinq->setDiscussionChannel('empty');
        
        $manager->persist($tricktroispointcinq);



        $trickfour = new Trick();
        $trickfour->setName('Stalefish');
        $trickfour->setCreator($user);
        $trickfour->setDescription('Stalefish is a trickfour that involves grabbing the heel edge of the board with the rear hand while the front leg is extended straight out.');
        $trickfour->setTrickgroup('Intermediate');
        $trickfour->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Tricks-Stalefish-Grab-620x393.jpg');
        $trickfour->setVideoLink('https://www.youtube.com/watch?v=oYkGZ3H6FNw');
        $trickfour->setCreatedAt(new DateTimeImmutable());
        $trickfour->setmodifiedAt(new DateTimeImmutable());
        $trickfour->setDeleted(0);
        $trickfour->setDiscussionChannel('empty');

        $manager->persist($trickfour);

        $trickfive = new Trick();
        $trickfive->setName('Tail Grab');
        $trickfive->setCreator($user);
        $trickfive->setDescription('Tail Grab is a trick that involves grabbing the tail of the snowboard with the rear hand.');
        $trickfive->setTrickgroup('Beginner');
        $trickfive->setImageLink('https://thumbs.dreamstime.com/b/snowboarder-performing-tail-grab-snowboarder-performing-tail-grab-mountains-129820259.jpg');
        $trickfive->setVideoLink('https://www.youtube.com/watch?v=lunYxCQrs1E');
        $trickfive->setCreatedAt(new DateTimeImmutable());
        $trickfive->setmodifiedAt(new DateTimeImmutable());
        $trickfive->setDeleted(0);
        $trickfive->setDiscussionChannel('empty');

        $manager->persist($trickfive);


        $tricksix = new Trick();
        $tricksix->setName('Method Grab');
        $tricksix->setCreator($user);
        $tricksix->setDescription('Method Grab is a trick that involves grabbing the heel edge of the board with the rear hand while the front leg is bent and the rear leg is extended.');
        $tricksix->setTrickgroup('Intermediate');
        $tricksix->setImageLink('https://miro.medium.com/max/1200/1*vV1tWalQFCyMhMPsSFwthA.jpeg');
        $tricksix->setVideoLink('https://www.youtube.com/watch?v=lunYxCQrs1E');
        $tricksix->setCreatedAt(new DateTimeImmutable());
        $tricksix->setmodifiedAt(new DateTimeImmutable());
        $tricksix->setDeleted(0);
        $tricksix->setDiscussionChannel('empty');

        $manager->persist($tricksix);


        $trickseven = new Trick();
        $trickseven->setName('Frontside 180');
        $trickseven->setCreator($user);
        $trickseven->setDescription('Frontside 180 is a trick that involves rotating the b  oard 180 degrees in a frontside direction while in the air.');
        $trickseven->setTrickgroup('Intermediate');
        $trickseven->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2013/09/FS180.jpg');
        $trickseven->setVideoLink('https://www.youtube.com/watch?v=ENalkvktYAI');
        $trickseven->setCreatedAt(new DateTimeImmutable());
        $trickseven->setmodifiedAt(new DateTimeImmutable());
        $trickseven->setDeleted(0);
        $trickseven->setDiscussionChannel('empty');
        
        $manager->persist($trickseven);


        $trickeight = new Trick();
        $trickeight->setName('Backside Boardslide');
        $trickeight->setCreator($user);
        $trickeight->setDescription('Backside Boardslide is a trick that involves sliding the board along a rail or box with the backside of the board facing the obstacle.');
        $trickeight->setTrickgroup('Advanced');
        $trickeight->setImageLink('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2011/11/Whitelines-95-gap-to-fronslide-boardslide.jpg');
        $trickeight->setVideoLink('https://www.youtube.com/watch?v=R3OG9rNDIcs');
        $trickeight->setCreatedAt(new DateTimeImmutable());
        $trickeight->setmodifiedAt(new DateTimeImmutable());
        $trickeight->setDeleted(0);
        $trickeight->setDiscussionChannel('empty');
        
        $manager->persist($trickeight);


        $tricknine = new Trick();
        $tricknine->setName('Frontside Boardslide');
        $tricknine->setCreator($user);
        $tricknine->setDescription('Frontside Boardslide is a trick that involves sliding the board along a rail or box with the frontside of the board facing the obstacle.');
        $tricknine->setTrickgroup('Intermediate');
        $tricknine->setImageLink('https://miro.medium.com/max/1156/1*6zaXI7Gk_5DM4wpKWvSjCw.jpeg');
        $tricknine->setVideoLink('https://www.youtube.com/watch?v=WRjNFodnOHk');
        $tricknine->setCreatedAt(new DateTimeImmutable());
        $tricknine->setmodifiedAt(new DateTimeImmutable());
        $tricknine->setDeleted(0);
        $tricknine->setDiscussionChannel('empty');

        $manager->persist($tricknine);
        



        $manager->flush();
    }
}
