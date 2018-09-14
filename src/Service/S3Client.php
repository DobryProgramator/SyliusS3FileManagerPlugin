<?php

declare(strict_types = 1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Service;

use Aws\S3\S3Client as AWSS3Client;

class S3Client
{
    /** @var AWSS3Client */
    private $S3Client;

    /** @var string */
    private $bucket;

    public function __construct(AWSS3Client $S3Client, string $bucket)
    {
        $this->S3Client = $S3Client;
        $this->bucket = $bucket;
    }

    public function getObject(string $filename)
    {
        return $this->S3Client->getObject([
            'Bucket' => $this->bucket,
            'Key' => 'files/' . $filename
        ]);
    }
}