<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Faker;

class candidatFixtures extends Fixture
{
    public function load(EntityManagerInterface|\Doctrine\Persistence\ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $candidates = Array();
        for ($i = 0; $i < 4; $i++) {
            $candidates[$i] = new Candidat();
            $candidates[$i]->setLastname($faker->lastName);
            $candidates[$i]->setFirstname($faker->firstName);
            $candidates[$i]->setBirthDate($faker->dateTimeBetween('-50 years','now'));
            $candidates[$i]->setRefPoleEmploi($faker->bankAccountNumber);


            $manager->persist($candidates[$i]);
        }


        $manager->flush();
    }
}