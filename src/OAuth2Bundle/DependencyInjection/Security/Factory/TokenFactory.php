<?php

/**
 * This file is part of the authbucket/oauth2-symfony-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\DependencyInjection\Security\Factory;

use AuthBucket\OAuth2\Symfony\Component\Security\Core\Authentication\Provider\TokenProvider;
use AuthBucket\OAuth2\Symfony\Component\Security\Http\EntryPoint\TokenAuthenticationEntryPoint;
use AuthBucket\OAuth2\Symfony\Component\Security\Http\Firewall\TokenListener;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class TokenFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $providerId = TokenProvider::class.'.'.$id;
        $container->setDefinition($providerId, new ChildDefinition(TokenProvider::class))
            ->replaceArgument(0, $id);

        $listenerId = TokenListener::class.'.'.$id;
        $container->setDefinition($listenerId, new ChildDefinition(TokenListener::class))
            ->replaceArgument(0, $id);

        if (!$defaultEntryPoint) {
            $entryPointId = 'security.authentication.entrypoint.token.'.$id;
            $container->setDefinition($entryPointId, new Definition(TokenAuthenticationEntryPoint::class));

            $defaultEntryPoint = $entryPointId;
        }

        return [$providerId, $listenerId, $defaultEntryPoint];
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'oauth2-token';
    }

    public function addConfiguration(NodeDefinition $node)
    {
    }
}
