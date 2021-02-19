<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pradnyashil',
            'email' =>'pradnya@test.com',
            'password' => bcrypt('12345678'),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, 
            fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus',

        ]);
    }
}
