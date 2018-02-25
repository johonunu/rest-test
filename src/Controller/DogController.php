<?php

/*
 * Appytrac API
 * (c) MesierAS <i@gobinath.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Github : https://github.com/mesieras/appytrac-api
 */

namespace App\Controller;

use App\Entity\Dog;
use App\Form\DogType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\View;

class DogController extends FOSRestController implements ClassResourceInterface {


    public function cgetAction(Request $request) {
        $em = $this->get('doctrine.orm.entity_manager');
        $query = $em->createQuery('SELECT a FROM App:Dog a');

        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10 /*limit per page*/
        );

        return [
            'items' => $pagination->getItems(),
            '_meta' => $pagination->getPaginationData()
        ];

    }

    /**
     * Undocumented function
     * @ParamConverter("dog", class="App:Dog")
     * @param Dog $dog
     * @return void
     */
    public function getAction(Dog $dog) {
        return $dog;
    }

    // "get_dog"  [GET] /dogs/{id}

    /**
     * @ParamConverter("dog", class="App:Dog")
     * @param Dog $dog
     * @return void
     */
    public function putAction(Dog $dog, Request $request) {

        $form = $this->createForm(DogType::class, $dog);

        // false at the end to allow, partial update
        $form->submit($request->request->all(), false);

        if (!$form->isValid()) {
            return $form;
        }

        /**
         * @var Dog
         */
        $dog = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $em->persist($dog);
        $em->flush();

        $routeOptions = array('dog' => $dog->getId(), '_format' => $request->get('_format'));

        return $this->routeRedirectView('get_dog', $routeOptions, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     *
     * @return View|\Symfony\Component\Form\Form
     */
    public function postAction(Request $request) {
        $form = $this->createForm(DogType::class);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        /**
         * @var Dog
         */
        $dog = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $em->persist($dog);
        $em->flush();

        $routeOptions = array('dog' => $dog->getId(), '_format' => $request->get('_format'));

        return $this->routeRedirectView('get_dog', $routeOptions, Response::HTTP_CREATED);
    }


    /**
     * Remove dog
     * @View(statusCode=204)
     * @param Dog $dog
     * @return void
     */
    public function deleteAction(Dog $dog) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($dog);
        $em->flush();
    }
}
