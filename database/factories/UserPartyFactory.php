<?php

namespace Database\Factories;

use App\Models\Party;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserParty>
 */
class UserPartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId= User::all()->pluck('id');
        $partyId= Party::all()->pluck('id');

        return [
            'user_id' => fake()->randomElement($userId),
            'party_id' => fake()->randomElement($partyId)
        ];
    }
}
