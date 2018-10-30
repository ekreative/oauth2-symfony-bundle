<?php

/**
 * This file is part of the authbucket/oauth2-symfony-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\TestBundle\DataFixtures\ORM;

use AuthBucket\Bundle\OAuth2Bundle\Tests\TestBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $model = new User();
        $model->setUsername('demousername1')
            ->setPassword('demopassword1')
            ->setRoles([
                'ROLE_USER',
            ]);
        $manager->persist($model);

        $model = new User();
        $model->setUsername('demousername2')
            ->setPassword('demopassword2')
            ->setRoles([
                'ROLE_USER',
            ]);
        $manager->persist($model);

        $model = new User();
        $model->setUsername('demousername3')
            ->setPassword('demopassword3')
            ->setRoles([
                'ROLE_USER',
            ]);
        $manager->persist($model);

        $manager->flush();
    }
}
