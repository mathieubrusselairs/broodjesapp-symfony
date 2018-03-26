<?php

namespace AppBundle\Service;

use AppBundle\Entity\Broodje;
use AppBundle\Service\Exception\ConnectivityException;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;

class BroodjesService
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

    public function persist(Broodje $broodje)
    {
        $this->entityManager->persist($broodje);
        $this->entityManager->flush();
    }

    public function remove(Broodje $broodje)
    {
        $this->entityManager->remove($broodje);
        $this->entityManager->flush();
    }
}