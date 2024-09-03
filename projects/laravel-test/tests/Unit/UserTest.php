<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function test_environment_variables()
    {
        $this->assertEquals('mysql', env('DB_CONNECTION'));
        $this->assertEquals('laravel_test', env('DB_DATABASE'));
        $this->assertEquals('root', env('DB_USERNAME'));
        $this->assertEquals('root', env('DB_PASSWORD'));
    }

    /** @test */
    public function test_database_connection()
    {
        $this->assertEquals('mysql', env('DB_CONNECTION'));
        $this->assertEquals('laravel_test', env('DB_DATABASE'));
    }

    /** @test */
    public function test_creates_a_user()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        $this->assertEquals('John Doe', $user->name);
    }
}
