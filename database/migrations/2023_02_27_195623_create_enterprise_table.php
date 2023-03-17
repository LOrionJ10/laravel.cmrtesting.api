<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(
            'enterprise',
            function (Blueprint $collection) {
            },
            [
                'validator' => [
                    '$jsonSchema' => [
                        'bsonType' => 'object',
                        'required' => [
                            'name',
                            'location'
                        ],
                        'properties' => [
                            'name' => [
                                'bsonType' => 'string'
                            ],
                            'location' => [
                                'bsonType' => 'string',
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
        Schema::dropIfExists('enterprise');
    }
};
