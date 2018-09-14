<?php

declare(strict_types = 1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Repository;

use DobryProgramator\SyliusS3FileManagerPlugin\Entity\FileInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface FileRepositoryInterface extends RepositoryInterface
{
    /**
     * @return QueryBuilder
     */
    public function createListQueryBuilder(): QueryBuilder;

    /**
     * @param string $code
     *
     * @return FileInterface|null
     */
    public function findOneByCode(string $code): ?FileInterface;
}