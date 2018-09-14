<?php

declare(strict_types=1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;

final class FileType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'dobryprogramator_sylius_s3_file_manager_plugin.ui.form.code',
                'disabled' => null !== $builder->getData()->getCode(),
            ])
            ->add('file', VichFileType::class, [
                'label' => 'dobryprogramator_sylius_s3_file_manager_plugin.ui.form.file',
                'translation_domain' => 'messages'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'dobryprogramator_sylius_s3_file_manager_plugin_file';
    }
}