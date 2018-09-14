<?php

declare(strict_types = 1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Controller;

use DobryProgramator\SyliusS3FileManagerPlugin\Entity\File;
use DobryProgramator\SyliusS3FileManagerPlugin\Repository\FileRepositoryInterface;
use DobryProgramator\SyliusS3FileManagerPlugin\Service\S3Client;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Response;

final class FileController extends ResourceController
{
    public function downloadFileAction(string $code)
    {
        /** @var FileRepositoryInterface $fileRepository */
        $fileRepository = $this->repository;
        /** @var File $file */
        $file = $fileRepository->findOneBy(['code' => $code]);

        if (!$file) {
            return new Response('Soubor nebyl nalezen.', Response::HTTP_NOT_FOUND);
        }

        /** @var S3Client $S3Client */
        $S3Client = $this->get('dobryprogramator_sylius_s3_file_manager_plugin.s3_client');
        $object = $S3Client->getObject($file->getFilename());

        if (!$object) {
            return new Response('Soubor nebyl nalezen.', Response::HTTP_NOT_FOUND);
        }

        header('Content-Description: File Transfer');
        header("Content-Type: {$object['ContentType']}");
        header('Content-Disposition: attachment; filename=' . $file->getFilename());
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        echo $object['Body'];

        return new Response();
    }
}