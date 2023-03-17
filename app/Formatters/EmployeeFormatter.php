<?php

namespace App\Formatters;

use App\Domain\Employee;

class EmployeeFormatter
{
    public function toDomain($employees)
    {
        if(!is_array($employees))
            return new Employee($employees->_id->__toString(),$employees->name,$employees->phone, $employees->address);

        $dataFormatter = [];
        foreach($employees as $employee){
            $employee = (object) $employee;
            $dataFormatter[] = new Employee(
                $employee->_id->__toString(),$employee->name, $employee->phone,
                $employee->address);
        }

        return $dataFormatter;
    }
}