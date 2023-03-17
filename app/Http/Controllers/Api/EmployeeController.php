<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\EmployeeModel;
use App\Responses\DefaultResponse;

class EmployeeController extends Controller
{
    private $employeeModel;

    function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function save(EmployeeRequest $request)
    {
        $saved = $this->employeeModel->save(
            $request->name,
            $request->phone,
            $request->address);
        //$saved = false;
        if(!$saved)
            return response()->json(new DefaultResponse('Hubo un problema al guardar al empleado'));

        return response()->json(new DefaultResponse('Empleado guardado exitosamente'));
    }

    public function getAll()
    {
        $getAll = $this->employeeModel->getAll();

        if(!$getAll)
            return response()->json(new DefaultResponse('Hubo un problema al mostrar los empleados'));

        return response()->json(new DefaultResponse('Empleados consultados exitosamente', false, $getAll));
        /*
        return response()->json([
            'data'=>$getAll
        ]);
        */
    }

    public function update(EmployeeRequest $request)
    {
        $updated = $this->employeeModel->update($request->id,$request->name,$request->phone,$request->address);
        //$updated = false;
        if(!$updated)
            return response()->json(new DefaultResponse('Hubo un error al actualizar los empleados'));

        return response()->json(new DefaultResponse('Empleado actualizado con exito'));
    }

    public function delete($id)
    {
        $deleted = $this->employeeModel->delete($id);
        //$deleted = false;

        if(!$deleted)
            return response()->json(new DefaultResponse('Hubo un error al eliminar la empresa'));

        return response()->json(new DefaultResponse('Empresa eliminada con exito'));
    }

    public function show($id)
    {
        $showed = $this->employeeModel->show($id);

        if(!$showed)
            return response()->json(new DefaultResponse('Hubo un problema al mostrar al empleado'));
        
        return response()->json(new DefaultResponse('Empleado consultado con exito', false, $showed));
    }
}