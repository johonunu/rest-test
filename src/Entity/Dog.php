<?php

/*
 * Appytrac API
 * (c) MesierAS <i@gobinath.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Github : https://github.com/mesieras/appytrac-api
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DogRepository")
 */
class Dog {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     * @Assert\NotBlank(message="Name is required")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * Get the value of id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set the value of type.
     *
     * @param mixed $type
     *
     * @return self
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of age.
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set the value of age.
     *
     * @param mixed $age
     *
     * @return self
     */
    public function setAge($age) {
        $this->age = $age;

        return $this;
    }
}
