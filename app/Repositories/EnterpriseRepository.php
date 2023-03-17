<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EnterpriseRepository
{
    public function save($name, $location)
    {
        return DB::collection('enterprise')->insert([
            'name' => $name,
            'location' => $location
        ]);
    }

    public function getAll()
    {
        return DB::collection('enterprise')->get()->toArray();
    }

    public function update($id, $name, $location)
    {
        return DB::collection('enterprise')
            ->where('_id', $id)
            ->update(
                [
                    'name' => $name,
                    'location' => $location
                ]
            );
    }

    public function delete($id)
    {
        return DB::collection('enterprise')
            ->where('_id', '=', $id)
            ->delete();

        //$deleted = DB::table('users')->where('votes', '>', 100)->delete();
    }
}
