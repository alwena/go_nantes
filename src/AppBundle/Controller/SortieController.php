<?php
/**
 * Created by PhpStorm.
 * User: Sylvie Hupin
 * Date: 13/08/2017
 * Time: 14:23
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Sortie;


class SortieController extends Controller
{

    /**
     * @param $id
     * @GET( path = "/sortie/{id}",
     *     name = "sortie",
     *     requirements = {"id"="\d+"}
     * )
     * @View()
     */
    public function getSortieAction($id){

        //recuperation de l'entite manager
        $em = $this->getDoctrine()->getManager();

        //On persiste l'entite, on recupere toute les sortie de la table Sortie
        $sortie = $em->getRepository('AppBundle:Sortie')->find($id);

        if (!$sortie) {
            throw $this->createNotFoundException('La sortie '.$id.' n\'existe pas');
        }

        return ($sortie);
    }

    /**
     * @GET( path = "/sortie",
     *     name = "sortie"
     * )
     * @View()
     */
    public function getSortiesAction(){

        //recuperation de l'entite manager
        $em = $this->getDoctrine()->getManager();

        //On persiste l'entite, on recupere toute les sorties de la table Sortie
        $sorties = $em->getRepository('AppBundle:Sortie')->findAll();

        if (!$sorties) {
            throw $this->createNotFoundException('Aucune sortie ');
        }

        return ($sorties);
    }

    /**
     * @POST(path = "/sortie",
     *       name = "sortie"
     * )
     * @View()
     * @ParamConverter("sortie", converter="fos_rest.request_body")
     */
    public function createSortieAction(Sortie $sortie){

        //recuperation de l'entite manager
        $em = $this->getDoctrine()->getManager();

        //On vérifie si le lieu existe dèjà.
        $nomLieu = $sortie->getLieu()->getNom();

        $lieu = $em->getRepository('AppBundle:Lieu')->findOneByNom($nomLieu);

        //Si le lieu existe deja, mise a jour uniquement de sortie
         if ($lieu) {
             //récupération de l'id du lieu
             $sortie->setLieu($lieu);
             $lieu->addSortie($sortie);
         } else {
             //Sinon mise a jour de sortie et lieu
             $em->persist($sortie);
         }

        $em->flush();

        return($sortie);
    }

    /**
     * @PUT(path = "/sortie/{id}",
     *       name = "sortie"
     * )
     * @View()
     * @ParamConverter("sortie", converter="fos_rest.request_body")
     */
    public function modifySortieAction(Sortie $sortie, $id){

        //recuperation de l'entite manager
        $em = $this->getDoctrine()->getManager();

        $em->merge($sortie);

        $em->flush();

        return($sortie);
    }

    /**
     * @DELETE(path = "/sortie/{id}",
     *       name = "sortie"
     * )
     * @View()
     */
    public function deleteSortieAction($id){

        //recuperation de l'entite manager
        $em = $this->getDoctrine()->getManager();

        $sortie = $em->getRepository('AppBundle:Sortie')->find($id);

        $em->remove($sortie);

        $em->flush();

        return($sortie);
    }


}