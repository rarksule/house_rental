<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    public function run()
    {
        // Get all users who can be owners/tenants
        $users = User::all();
        
        if ($users->isEmpty()) {
            // Create some users if none exist
            $users = User::factory()->count(10)->create();
        }

        // Create properties with relationships
        House::factory()->count(50)->make()->each(function ($house) use ($users) {
            // Assign random owner
            $owner = $users->random();
            $house->owner_id = $owner->id;
            
            // Randomly assign tenant (50% chance)
            if (rand(0, 1) && $users->count() > 1) {
                // Ensure tenant is different from owner
                $tenant = $users->where('id', '!=', $owner->id)->random();
                $house->tenant_id = $tenant->id;
            }
            
            $house->save();
        });

        // Create some soft-deleted properties
        House::factory()->count(25)->create()->each(function ($House) {
            $House->delete();
        });
    }
}