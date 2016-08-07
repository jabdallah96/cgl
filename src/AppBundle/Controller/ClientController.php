<?php
/**
 * Created by PhpStorm.
 * User: jad
 * Date: 8/3/16
 * Time: 10:04 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class ClientController extends Controller
{
    /**
     * @Route("/client/new", name="client_new")
     */
    public function newClientAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setCreatedAt(date_create());
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('proposal_new');
            //Need to have this redirect to index when approached from index
        }

        return $this->render('default/newClient.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/client/{client_id}/{proposal_id}", name="client_view")
     * @ParamConverter("client", class="AppBundle:Client", options={"id" = "client_id"})
     */
    public function viewProposalAction(Request $request, Client $client, $proposal_id)
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('proposal_view' , ['proposal_id' => $proposal_id]) ;
        }

            return $this->render('default/newClient.html.twig', [
            'form' => $form->createView(), 'client' => $client
        ]);

    }
}