<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @author:  Sekou KOÏTA <sekou.koita@supinfo.com>
 * @license: GPL
 *
 */

namespace Tms\Bundle\MediaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tms\Bundle\MediaBundle\DependencyInjection\Compiler\DefineMediaProvidersCompilerPass;
use Tms\Bundle\MediaBundle\DependencyInjection\Compiler\DefineMediaMetadataExtractorCompilerPass;

class TmsMediaBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DefineMediaProvidersCompilerPass());
        $container->addCompilerPass(new DefineMediaMetadataExtractorCompilerPass());
    }
}
