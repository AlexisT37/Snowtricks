<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Trick;
use DateTimeImmutable;
use App\Entity\ImageLink;
use App\Entity\VideoLink;
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
        $user->setIsVerified(true);
        $manager->persist($user);
        $manager->flush();


        $trick = new Trick();
        $trick->setName('Ollie');
        $email = 'example@example.com';
        $userRepository = $this->em->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            throw new \Exception(sprintf('User with email "%s" not found', $email));
        }

        $trick->setCreator($user);
        $trick->setDescription('The easiest trick');
        $trick->setTrickgroup('Beginner');
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trick->addImageLink($imageLink);

        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trick->addImageLink($imageLink2);

        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        
        $trick->addVideoLink($videoLink);

        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trick->addVideoLink($videoLink2);

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

        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickdos->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trickdos->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trickdos->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trickdos->addVideoLink($videoLink2);


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
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $tricktres->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $tricktres->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $tricktres->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $tricktres->addVideoLink($videoLink2);
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
        
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $tricktroispointcinq->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $tricktroispointcinq->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $tricktroispointcinq->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $tricktroispointcinq->addVideoLink($videoLink2);
        
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
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickfour->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trickfour->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trickfour->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trickfour->addVideoLink($videoLink2);
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

        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickfive->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trickfive->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trickfive->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trickfive->addVideoLink($videoLink2);

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
        
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $tricksix->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $tricksix->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $tricksix->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $tricksix->addVideoLink($videoLink2);
        
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
        
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickseven->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trickseven->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trickseven->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trickseven->addVideoLink($videoLink2);

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
        
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $trickeight->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $trickeight->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $trickeight->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $trickeight->addVideoLink($videoLink2);

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
        
        $imageLink = new ImageLink();
        $imageLink->setContent('https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2014/01/Trick-Meloncollie-Grab-620x421.jpg');
        $tricknine->addImageLink($imageLink);
        $imageLink2 = new ImageLink();
        $imageLink2->setContent('https://assets2.rockpapershotgun.com/obv.jpg/BROK/resize/1920x1920%3E/format/jpg/quality/80/obv.jpg');
        $tricknine->addImageLink($imageLink2);
        $videoLink = new VideoLink();
        $videoLink->setContent('https://www.youtube.com/watch?v=kOyCsY4rBH0');
        $tricknine->addVideoLink($videoLink);
        $videoLink2 = new VideoLink();
        $videoLink2->setContent('https://www.youtube.com/watch?v=ZsNPUaYV4PM');
        $tricknine->addVideoLink($videoLink2);

        $tricknine->setCreatedAt(new DateTimeImmutable());
        $tricknine->setmodifiedAt(new DateTimeImmutable());
        $tricknine->setDeleted(0);
        $tricknine->setDiscussionChannel('empty');

        $manager->persist($tricknine);

        $manager->flush();
    }
}
