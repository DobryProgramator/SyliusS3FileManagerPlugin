<?php

declare(strict_types=1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\EventListener;

use Aws\S3\S3Client;
use DobryProgramator\SyliusS3FileManagerPlugin\Entity\File;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;

final class FileDeleteListener
{
    /**
     * @var S3Client
     */
    private $S3Client;

    /**
     * @var string
     */
    private $bucket;

    public function __construct(S3Client $S3Client, string $bucket)
    {
        $this->S3Client = $S3Client;
        $this->bucket = $bucket;
    }

    public function deleteFromBucket(ResourceControllerEvent $event): void
    {
        /** @var File $file */
        $file = $event->getSubject();

        $this->S3Client->deleteMatchingObjects($this->bucket, 'files/' . $file->getFilename());
    }
}