<?php

/**
 * This file is part of the authbucket/oauth2-symfony-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\TokenType;

use AuthBucket\Bundle\OAuth2Bundle\Tests\WebTestCase;
use AuthBucket\OAuth2\TokenType\MacTokenTypeHandler;
use Symfony\Component\HttpFoundation\Request;

class MacTokenTypeHandlerTest extends WebTestCase
{
    /**
     * @expectedException \AuthBucket\OAuth2\Exception\TemporarilyUnavailableException
     */
    public function testExceptionGetAccessToken()
    {
        $request = new Request();
        $handler = new MacTokenTypeHandler(
            $this->get('validator'),
            $this->get('test.authbucket_oauth2.model_manager.factory')
        );
        $handler->getAccessToken($request);
    }

    /**
     * @expectedException \AuthBucket\OAuth2\Exception\TemporarilyUnavailableException
     */
    public function testExceptionCreateAccessToken()
    {
        $modelManagerFactory = new BarModelManagerFactory();
        $handler = new MacTokenTypeHandler(
            $this->get('validator'),
            $this->get('test.authbucket_oauth2.model_manager.factory')
        );
        $handler->createAccessToken($modelManagerFactory, 'foo');
    }
}
