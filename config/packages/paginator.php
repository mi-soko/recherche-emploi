
<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void
{
    $configurator->extension('knp_paginator', [
        'template' => [
            'pagination' => '@KnpPaginator/Pagination/twitter_bootstrap_v4_font_awesome_sortable_link.html.twig',     // sliding pagination controls template
        ]
    ]);
};
