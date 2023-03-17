<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\SaveEnterpriseRequest;

use App\Models\EnterpriseModel;
use App\Responses\DefaultResponse;

class EnterpriseController extends Controller
{
    private $enterpriseModel;

    function __construct()
    {
        $this->enterpriseModel = new EnterpriseModel();
    }

    public function save(SaveEnterpriseRequest $request)
    {
        $saved = $this->enterpriseModel->save($request->name, $request->location);
        if (!$saved)
            return response()->json(new DefaultResponse('Hubo un error al guardar la empresa'));

        return response()->json(new DefaultResponse('Empresa guardada con exito', false));
    }

    public function getAll()
    {
        $getAll = $this->enterpriseModel->getAll();
        //$getAll = false;
        if (!$getAll)
            return response()->json(new DefaultResponse('Hubo un error al consultar las empresas'));

        return response()->json(new DefaultResponse('Empresa guardada con exito', false, $getAll));
    }

    public function update(SaveEnterpriseRequest $request)
    {
        $updated = $this->enterpriseModel->update($request->id, $request->name, $request->location);
        //$updated = false;
        if (!$updated)
            return response()->json(new DefaultResponse('Hubo un error al actualizar la empresa'));

        return response()->json(new DefaultResponse('Empresa actualizada con exito'));
    }

    public function delete($id)
    {
        //dd($request);
        $deleted = $this->enterpriseModel->delete($id);
        //$deleted = false;

        if (!$deleted)
            return response()->json(new DefaultResponse('Hubo un error al eliminar la empresa'));

        return response()->json(new DefaultResponse('Empresa eliminada con exito'));
    }
}
