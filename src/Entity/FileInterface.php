<?php

declare(strict_types = 1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\HttpFoundation\File\File;

interface FileInterface extends ResourceInterface
{
    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function getFilename(): ?string;

    public function setFilename(?string $filename): void;

    public function getFile(): ?File;

    public function setFile(?File $file): void;
}