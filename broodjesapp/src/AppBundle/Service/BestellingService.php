<?php

namespace AppBundle\Service;

use AppBundle\Entity\Bestelling;
use AppBundle\Entity\Brood;
use AppBundle\Service\Exception\ConnectivityException;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;

class BestellingService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository('AppBundle:Brood');
        $this->entityManager = $entityManager;
    }

    public function fetchAll()
    {
        try {
            return $this->repository->findAll();
        } catch (DBALException $DBALException) {
            throw new ConnectivityException($DBALException->getMessage());
        }
    }

    public function fetchAllBestellingen()
    {
        return $this->repository->findAll();
    }

    public function persist(Bestelling $bestelling)
    {
        $this->entityManager->persist($bestelling);
        $this->entityManager->flush();
    }

    public function remove(Bestelling $bestelling)
    {
        $this->entityManager->remove($bestelling);
        $this->entityManager->flush();
    }
}