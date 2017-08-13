<?php
/**
 * Created by PhpStorm.
 * User: Sylvie Hupin
 * Date: 13/08/2017
 * Time: 15:59
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Sortie;
use AppBundle\Entity\Lieu;
use AppBundle\Entity\Avis;

class LoadSortie implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $sortie = new Sortie();
        $date = new \DateTime('2017-07-01');
        $sortie->setDate($date);

        $lieu = new Lieu;
        $lieu->setNom('Le Nid');
        $lieu->setAdresse('Place de Bretagne - 44047 Nantes');

        $avis = new Avis;
        $avis->setCommentaire('Trop cher');
        $avis->setNbEtoile(1);
        $avis->setLieu($lieu);

        $lieu->addAvi($avis);

        $avis1 = new Avis;
        $avis1->setCommentaire('Vue superbe de Nantes');
        $avis1->setNbEtoile(4);
        $avis1->setLieu($lieu);

        $lieu->addAvi($avis1);


        $sortie->setLieu($lieu);

        $sortie1 = new Sortie();
        $date = new \DateTime('2017-07-14');
        $sortie1->setDate($date);

        $lieu = new Lieu;
        $lieu->setNom('Jardin des Plantes');
        $lieu->setAdresse('Rue Stanilas Baudry - 44000 Nantes');

        $avis = new Avis;
        $avis->setCommentaire('Tres beau jardin');
        $avis->setNbEtoile(3);
        $avis->setLieu($lieu);

        $lieu->addAvi($avis);

        $sortie1->setLieu($lieu);


        $manager->persist($sortie);
        $manager->persist($sortie1);
        $manager->flush();





    }
}