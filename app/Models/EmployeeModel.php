<?php

namespace App\Models;

use App\Formatters\EmployeeFormatter;
use MongoDB\BSON\ObjectId;

use App\Repositories\EmployeeRepository;

class EmployeeModel
{
    private $employeeRepository, $employeeFormatter;

    // crear constructor
    function __construct()
    {
        $this->employeeRepository = new EmployeeRepository();
        $this->employeeFormatter = new EmployeeFormatter();
    }

    public function save($name,$phone,$address)
    {
        //dd('enModel');
        return $this->employeeRepository->save($name,$phone,$address);
    }

    public function getAll()
    {
        //dd('getAll');
        $employees = $this->employeeRepository->getAll();
        return $this->employeeFormatter->toDomain($employees);
    }

    public function update($id,$name,$phone,$address)
    {
        //dd('Actualizado');
        return $this->employeeRepository->update(new ObjectId($id),$name,$phone,$address);
    }

    public function delete($id)
    {
        //dd('Eliminado');
        return $this->employeeRepository->delete(new ObjectId($id));
    }

    public function show($id)
    {
        //dd('ola');
        $employees = (object) $this->employeeRepository->show(new ObjectId($id));
        return $this->employeeFormatter->toDomain($employees);
    }
}