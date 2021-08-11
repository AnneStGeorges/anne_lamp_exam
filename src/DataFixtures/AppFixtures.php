<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for($i=0; $i<21; $i++){
           $date = new \DateTime(date("Y-m-d",mt_rand(strtotime('2021-01-01'),strtotime('2021-08-11'))));
           $article = new Article();
           $article->setDate($date);
           $article->setTitle('Lorem'.$i);
           $article->setPicture('../doc/img/'.$i.'.jpg');
           $article->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
           $manager->persist($article);
       }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [ArticleFixtures::class];
    }
}
