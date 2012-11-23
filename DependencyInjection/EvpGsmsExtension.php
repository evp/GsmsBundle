<?php

namespace Evp\Bundle\GsmsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EvpGsmsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['credentials']['username'])) {
            $container->setParameter('evp_gsms.credentials.username', $config['credentials']['username']);
        }

        if (isset($config['credentials']['password'])) {
            $container->setParameter('evp_gsms.credentials.password', $config['credentials']['password']);
        }

        $container->setParameter('evp_gsms.from', isset($config['from']) ? $config['from'] : null);
        $container->setParameter(
            'evp_gsms.callback_uri',
            isset($config['callback_uri']) ? $config['callback_uri'] : null
        );

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
