<?php

namespace App\Models;

use MongoDB\BSON\ObjectId;

use App\Repositories\EnterpriseRepository;

use App\Formatters\EnterpriseFormatter;

class EnterpriseModel
{
    private $enterpriseRepository, $enterpriseFormatter;

    function __construct()
    {
        $this->enterpriseRepository = new EnterpriseRepository();
        $this->enterpriseFormatter = new EnterpriseFormatter();
    }

    public function save($name, $location)
    {
        return $this->enterpriseRepository->save($name, $location);
    }

    public function getAll()
    {
        $enterprises = $this->enterpriseRepository->getAll();
        return $this->enterpriseFormatter->toDomain($enterprises);
    }

    public function update($id, $name, $location)
    {
        //dd('actualizar');
        return $this->enterpriseRepository->update(new ObjectId($id), $name, $location);
    }

    public function delete($id)
    {
        //dd('Eliminado');
        return $this->enterpriseRepository->delete(new ObjectId($id));
    }
}
