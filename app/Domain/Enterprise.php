<?php

namespace App\Domain;

use JsonSerializable;

class Enterprise implements JsonSerializable
{
    private $id, $name, $location;

    function __construct($id, $name, $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
}
