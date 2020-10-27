<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * @Route("/administrar")
 */

class DefaultController extends Controller
{
    /**
     * @Route("/registrar", name="registro_usuario")
     */
    public function registroUsuarioAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $usuario->setRoles(['ROLE_USER']);
            $entityManager->flush();

            return $this->redirectToRoute('usuario_index');
        }

        return $this->render(
            'usuario/registro.html.twig',
            ['form' => $form->createView()]
        );
    }
}
