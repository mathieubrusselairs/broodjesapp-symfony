<?php

namespace AppBundle\Service;

use AppBundle\Entity\Bestelling;
use AppBundle\Service\Exception\ConnectivityException;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;

class BestellingService
{
    private $entityManager;

    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository('AppBundle:Broodje');
    }

    public function fetchAll()
    {
        try {
            return $this->repository->findAll();
        } catch (DBALException $DBALException) {
            throw new ConnectivityException($DBALException->getMessage());
        }
    }

    public function fetchRecentPosts()
    {
        return $this->repository->findBy([], [], 5, 0);
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