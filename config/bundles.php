<?php

/*
 * Appytrac API
 * (c) MesierAS <i@gobinath.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Github : https://github.com/mesieras/appytrac-api
 */

return array(
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => array('all' => true),
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class => array('all' => true),
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => array('all' => true),
    Symfony\Bundle\MonologBundle\MonologBundle::class => array('all' => true),
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class => array('all' => true),
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => array('all' => true),
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => array('all' => true),
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => array('dev' => true, 'test' => true),
    Symfony\Bundle\TwigBundle\TwigBundle::class => array('all' => true),
    Symfony\Bundle\DebugBundle\DebugBundle::class => array('dev' => true, 'test' => true),
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => array('all' => true),
    Symfony\Bundle\MakerBundle\MakerBundle::class => array('dev' => true),
    FOS\RestBundle\FOSRestBundle::class => array('all' => true),
    Knp\Bundle\PaginatorBundle\KnpPaginatorBundle::class => array('all' => true),
);
