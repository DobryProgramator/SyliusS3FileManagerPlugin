<?php

declare(strict_types=1);

namespace DobryProgramator\SyliusS3FileManagerPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class FilesMenuBuilder
{
    public function addAdminMenuItems(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $newSubmenu = $menu
            ->addChild('dobryprogramator_s3_file_manager')
            ->setLabel('dobryprogramator_sylius_s3_file_manager_plugin.ui.menu.title')
        ;

        $newSubmenu
            ->addChild('list_files', [
                'route' => 'dobryprogramator_sylius_s3_file_manager_plugin_admin_file_index',
            ])
            ->setLabel('dobryprogramator_sylius_s3_file_manager_plugin.ui.menu.list_files')
            ->setLabelAttribute('icon', 'file')
        ;

        $newSubmenu
            ->addChild('add_file', [
                'route' => 'dobryprogramator_sylius_s3_file_manager_plugin_admin_file_create',
            ])
            ->setLabel('dobryprogramator_sylius_s3_file_manager_plugin.ui.menu.add_file')
            ->setLabelAttribute('icon', 'upload')
        ;
    }
}