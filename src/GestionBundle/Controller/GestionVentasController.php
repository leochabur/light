<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use GestionBundle\Entity\ventas\Cliente;
use GestionBundle\Form\ventas\ClienteType;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\ventas\Ciudad;
use GestionBundle\Form\ventas\CiudadType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/ventas")
 */

class GestionVentasController extends Controller
{

    ////////////ABM ciudad
    /**
     * @Route("/ciudades/alta", name="alta_ciudad")
     */
    public function altaCiudadAction()
    {
        $ciudad = new Ciudad();
        $form = $this->getFormAltaCiudad($ciudad);

        return $this->render('@Gestion/ventas/altaCiudad.html.twig', ['form' => $form->createView()]);
    }

    private function getFormAltaCiudad($ciudad)
    {
        return $this->createForm(CiudadType::class, $ciudad, ['action' => $this->generateUrl('alta_ciudad_procesar'),'method' => 'POST']);
    }

    /**
     * @Route("/ciudades/altaproc", name="alta_ciudad_procesar", methods={"POST"})
     */
    public function procesarAltaCiudadAction(Request $request)
    {
        $ciudad = new Ciudad();
        $form = $this->getFormAltaCiudad($ciudad);

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ciudad);
            $em->flush();
            return $this->redirectToRoute('alta_ciudad');
        }
        return $this->render('@Gestion/ventas/altaCiudad.html.twig', ['form' => $form->createView()]);
    }
    /////////////////////////

    /////////////////MANEJO DE CLIENTES///////////////////////////////////////////

    /**
     * @Route("/cliente/state/{id}", name="cliente_change_state")
     */
    public function changeStateCliente($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->find(Cliente::class, $id);

        if (!$cliente) 
        {
            return new JsonResponse(['status' => false, 'message' => 'Cliente inexistente']);
        }

        $state = $request->request->get('state');
        $cliente->setActivo($state);
        $em->flush();
        return new JsonResponse(['status' => true]);
    }

    /**
     * @Route("/cliente/alta", name="alta_cliente")
     */
    public function altaClienteAction()
    {
        $cliente = new Cliente();
        $action = $this->generateUrl('alta_cliente_procesar');
        $form = $this->getFormAltaCliente($cliente, $action);

        return $this->render('@Gestion/ventas/altaCliente.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Cliente']);
    }

    private function getFormAltaCliente($cliente, $action)
    {
 		return $this->createForm(ClienteType::class, 
                                $cliente, 
                                ['action' => $action,'method' => 'POST']);
    }

    /**
     * @Route("/cliente/altaproc", name="alta_cliente_procesar", methods={"POST"})
     */
    public function procesarAltaClienteAction(Request $request)
    {
        $cliente = new Cliente();
        $action = $this->generateUrl('alta_cliente_procesar');
        $form = $this->getFormAltaCliente($cliente, $action);
        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();
            return $this->redirectToRoute('alta_cliente');
        }


        return $this->render('@Gestion/ventas/altaCliente.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Cliente']);
    }

    /**
     * @Route("/cliente/listar", name="listado_clientes")
     */
    public function listadoClientesAction()
    {
        $clientes = $this->getDoctrine()->getRepository(Cliente::class)->getAllClientes();
        return $this->render('@Gestion/ventas/listadoClientes.html.twig', ['clientes' => $clientes]);
    }

    /**
     * @Route("/cliente/editar/{id}", name="editar_cliente")
     */
    public function editarClienteAction($id)
    {
        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);
        $action = $this->generateUrl('editar_cliente_procesar', ['id' => $id]);
        $form = $this->getFormAltaCliente($cliente, $action);
        return $this->render('@Gestion/ventas/altaCliente.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Cliente']);
    }

    /**
     * @Route("/cliente/editarproc/{id}", name="editar_cliente_procesar", methods={"POST"})
     */
    public function procesarEditarClienteAction($id, Request $request)
    {
        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);
        $action = $this->generateUrl('editar_cliente_procesar', ['id' => $id]);
        $form = $this->getFormAltaCliente($cliente, $action);
        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listado_clientes');
        }
        return $this->render('@Gestion/ventas/altaCliente.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Cliente']);
    }
/////////////////////////FIN GESTION TRAFICO////////////////////////////////////////////////////////////////

}
