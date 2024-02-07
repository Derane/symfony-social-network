<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $microPost = new MicroPost();
        $microPost->setTitle('Welcome');
        $manager->persist($microPost);
        $microPost1 = new MicroPost();
        $microPost1->setTitle('Hello');
        $manager->persist($microPost1);
        $manager->flush();
    }
}
