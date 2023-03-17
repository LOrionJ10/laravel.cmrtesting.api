<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(
            'employee',
            function (Blueprint $collection) {
            },
            [
                'validator' => [
                    '$jsonSchema' => [
                        'bsonType' => 'object',
                        'required' => [
                            'name',
                            'phone',
                            'address'
                        ],
                        'properties' => [
                            'name' => [
                                'bsonType' => 'string'
                            ],
                            'phone' => [
                                'bsonType' => 'string',
                                'pattern' => '^\d{10}$'
                            ],
                            'address' => [
                                'bsonType' => 'string'
                            ]
                        ]
                    ]
                ],
                'validationLevel' => 'strict',
                'validationAction' => 'error'
            ]
        );
    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
