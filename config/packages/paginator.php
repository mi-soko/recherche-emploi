
<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void
{
    $configurator->extension('knp_paginator', [
        'template' => [
            'pagination' => "@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig",     // sliding pagination controls template
        ]
    ]);
};
