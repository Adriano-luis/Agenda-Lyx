<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::updateOrCreate([
            'name' => 'Adriano Oliveira',
            'email' => 'adrianooliveira2332@gmail.com',
            'user_id' => 1,
            'phone' => '11981285688',
            'gitUser' => 'Adriano-luis',
        ], ['email' => 'adrianooliveira2332@gmail.com']);
    }
}
