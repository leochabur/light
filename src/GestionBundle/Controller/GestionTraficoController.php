<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\trafico\Servicio;
use GestionBundle\Form\trafico\ServicioType;
use GestionBundle\Entity\trafico\Turno;
use GestionBundle\Form\trafico\TurnoType;
use GestionBundle\Form\utils\SelectClienteType;

/**
 * @Route("/trafico")
 */

class GestionTraficoController extends Controller
{

    ////////////ABM Servicio
    /**
     * @Route("/servicios/alta", name="alta_servicio")
     */
    public function altaServicioAction()
    {        
        $servicio = new Servicio();
        $form = $this->getFormAltaServicio($servicio);

        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Servicio']);
    }

    private function getFormAltaServicio($servicio)
    {
        $user = $this->getUser();
        return $this->createForm(ServicioType::class, 
                                 $servicio, 
                                 ['usuario' => $user, 'action' => $this->generateUrl('alta_servicio_procesar'),'method' => 'POST']);
    }

    /**
     * @Route("/servicios/altaprocesar", name="alta_servicio_procesar", methods={"POST"})
     */
    public function procesarAltaServicioAction(Request $request)
    {
        $servicio = new Servicio();
        $form = $this->getFormAltaServicio($servicio);
        $form->handleRequest($request);
        if ($form->isValid())
        {
        	$em = $this->getDoctrine()->getManager();
        	$em->persist($servicio);
        	$em->flush();
        	/*$this->addFlash(
					            'success',
					            'El servicio '.$servicio.', ha sido generado exitosamente!'
					        );*/
        	return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Servicio']);
    }

    /**
     * @Route("/servicios/lista", name="lista_servicios", methods={"POST", "GET"})
     */
    public function listarServicioAction(Request $request)
    {
        $estructura = $this->get('session')->get('estructura');
        $form = $this->createForm(SelectClienteType::class, null,  ['estructura' => $estructura]);
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $data = $form->getData();
            $repository = $this->getDoctrine()->getManager()->getRepository(Servicio::class);
            $servicios = $repository->getServiciosCliente($data['clientes'], $estructura);
            return $this->render('@Gestion/trafico/listadoServicios.html.twig', ['servicios' => $servicios, 'form' => $form->createView()]);
        }
        return $this->render('@Gestion/trafico/listadoServicios.html.twig', ['form' => $form->createView()]);
    }



    /**
     * @Route("/turnos/alta/{id}", name="alta_turnos")
     */
    public function altaTurnoAction($id)
    {
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $turno = new Turno();
        $url = $this->generateUrl('alta_turnos_procesar', ['id' => $servicio->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);

        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Agregar Turno a Servicio']);
    }

    private function getFormAltaTurno($turno, $servicio, $url)
    {
        return $this->createForm(TurnoType::class, $turno, 
        						['servicio' => $servicio, 'action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/turno/altaproc/{id}", name="alta_turnos_procesar", methods={"POST"})
     */
    public function procesarAltaTurnoAction($id, Request $request)
    {
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $turno = new Turno();
        $url = $this->generateUrl('alta_turnos_procesar', ['id' => $servicio->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($turno);
            $em->flush();
            $this->addFlash(
                                'success',
                                'El turno ha sido generado exitosamente!'
                            );
            return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Agregar Turno a Servicio']);
    }

    /**
     * @Route("/turnos/editar/{tno}", name="editar_turno")
     */
    public function editarTurnoAction($tno)
    {
        $turno = $this->getDoctrine()->getRepository(Turno::class)->find($tno);
        $servicio = $turno->getServicio();
        $url = $this->generateUrl('editar_turno_procesar', ['tno' => $turno->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);

        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['edit' => true, 'servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Modificar Turno']);
    }

    /**
     * @Route("/turno/editarproc/{tno}", name="editar_turno_procesar", methods={"POST"})
     */
    public function procesarEditarTurnoAction($tno, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $turno = $em->getRepository(Turno::class)->find($tno);
        $servicio = $turno->getServicio();
        $url = $this->generateUrl('editar_turno_procesar', ['tno' => $turno->getId()]);

        $form = $this->getFormAltaTurno($turno, $servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em->flush();
            $this->addFlash(
                                'success',
                                'El turno ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['edit' => true, 'servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Modificar Turno']);
    }

}
