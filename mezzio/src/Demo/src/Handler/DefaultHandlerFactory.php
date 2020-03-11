<?php

declare(strict_types=1);

namespace Demo\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class DefaultHandlerFactory
{
    public function __invoke(ContainerInterface $container) : DefaultHandler
    {
        return new DefaultHandler($container->get(TemplateRendererInterface::class));
    }
}
