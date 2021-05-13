<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\Estructura;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsuariosController extends Controller
{

    /**
     * @Route("/", name="principal")
     */
    public function principalAction(AuthenticationUtils $authenticationUtils)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return $this->redirectToRoute('select_estructura');
        }

        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return $this->redirectToRoute('home_page');
        }

        $error = $authenticationUtils->getLastAuthenticationError();


        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('default/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/redirect/{str}", name="redirect_to_index")
     */
    public function homeAction($str)
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $entityManager = $this->getDoctrine()->getManager();
        $estructura = $entityManager->find(Estructura::class, $str);

        $this->get('session')->set('estructura', $estructura);

        return $this->redirectToRoute('home_page');
    }

    /**
     * @Route("/select", name="select_estructura")
     */
    public function selectEstructuraAction()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->get('session')->set('module', null);
        return $this->render('default/select.html.twig');
    }

    /**
     * @Route("/home", name="home_page")
     */
    public function indexAction()
    {       
       return $this->render('@Gestion/Default/index.html.twig');
    }

    /**
     * @Route("/setsession", name="set_session_menu")
     */
    public function setSessionMenuAction(Request $request)
    {
        $module = $request->request->get('module');
        $this->get('session')->set('module', $module);
       return new JsonResponse(['route' => $this->generateUrl('home_page')]);
    }

    /**
     * @Route("/rethome", name="return_to_home")
     */
    public function returnToHomeAction()
    {
        $this->get('session')->set('module', null);
        return $this->redirectToRoute('home_page');
    }
}
