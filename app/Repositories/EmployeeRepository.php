<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EmployeeRepository
{
    public function save($name,$phone,$address)
    {
        return DB::collection('employee')->insert([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address
        ]);
    }

    public function getAll()
    {
        return DB::collection('employee')->get()->toArray();
    }

    public function update($id,$name,$phone,$address)
    {
        return DB::collection('employee')
                    ->where('_id',$id)
                    ->update(
                        [
                            'name'=>$name,
                            'phone'=>$phone,
                            'address'=>$address
                        ]);
    }

    public function delete($id)
    {
        return DB::collection('employee')
                    ->where('_id', $id)
                    ->delete();
    }

    public function show($id)
    {
        return DB::collection('employee')
                    ->where('_id',$id)
                    ->first();
    }
}