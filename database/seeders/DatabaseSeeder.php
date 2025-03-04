<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Cycle;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'head']);
        Role::factory()->create(['name' => 'MTA']);
        Role::factory()->create(['name' => 'STA']);
        Role::factory()->create(['name' => 'CA']);
        Role::factory()->create(['name' => 'student']);

        Cycle::factory()->create(['name' => 'Y25C1', 'start_date' => '2025-03-01', 'end_date' => '2025-08-31']);


        Group::factory()->create(['name' => 'Group A', 'schedule' => '8:00 - 10:00', 'cycle_id' => 1]);
        Group::factory()->create(['name' => 'Group B', 'schedule' => '10:00 - 12:00', 'cycle_id' => 1]);
        Group::factory()->create(['name' => 'Group C', 'schedule' => '01:00 - 03:00', 'cycle_id' => 1]);
        Group::factory()->create(['name' => 'Group E', 'schedule' => '03:00 - 05:00', 'cycle_id' => 1]);

        User::factory()->create([
            'name' => 'Y23C1-jvargas',
            'email' => 'joseph@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 1,
            'group_id' => 1
        ]);
        
        $attendances = Attendance::factory(20)->create();
    }
}
