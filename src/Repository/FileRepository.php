<?php

declare(strict_types = 1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Repository;

use DobryProgramator\SyliusS3FileManagerPlugin\Entity\FileInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class FileRepository extends EntityRepository implements FileRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createListQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('f');
    }

    /**
     * {@inheritdoc}
     */
    public function findOneByCode(string $code): ?FileInterface
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.code = :code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult();
    }
}