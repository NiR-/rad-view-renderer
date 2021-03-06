<?php

namespace Knp\Rad\ViewRenderer\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class ViewRendererExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('knp_rad_view_renderer.enabled_native_renderers', $config['renderers']);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'knp_rad_view_renderer';
    }
}
