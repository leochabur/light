<?php

namespace GestionBundle\Repository\segVial;

/**
 * UnidadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UnidadRepository extends \Doctrine\ORM\EntityRepository
{
	public function getUnidades()
	{
		$data =  $this->createQueryBuilder('u')
						->join('u.propietario', 'p')
						->orderBy('p.razonSocial')
					    ->addOrderBy('u.interno')
					    ->getQuery()
					    ->getResult();
		return $data;
	}
}