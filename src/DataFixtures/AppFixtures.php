<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\MicroPost;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                'title' =>'Welcome to Poland!',
                'text' =>'Posland is a greate country for leaving with kids',
                'created'=> new \DateTime(),
            ],
            [
                'title' =>'Welcome to Spain!',
                'text' =>'Spain is a greate country for chilling on the beaches',
                'created'=> new \DateTime(),
            ],
        ];

        foreach ($data as $inst) {
            $microPost = new MicroPost();
            foreach ($inst as $key => $item) {
                $microPost->$key($item);
            }
            $manager->persist($microPost);
        }
        $manager->flush();
    }
}
