<?php

namespace App\Domain;

use JsonSerializable;

class Employee implements JsonSerializable
{
    private $id, $name, $phone, $address;

    function __construct($id, $name, $phone, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}