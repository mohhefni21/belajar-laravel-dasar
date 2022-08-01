<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Moh Hefni',
            'email' => 'mohhefni2105@gmail.com',
            'username' => 'mohhefni',
            'password' => bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'Nur Asyfa fadilah',
        //     'email' => 'esi2105@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);
        User::factory(5)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'mechine-learning',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Post::factory(30)->create();
        // Post::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum, assumenda illum tempore enim rerum, suscipit quidem delectus eligendi iste fugit unde reiciendis numquam quisquam et eos ad a. Voluptatibus rem voluptate commodi dolore omnis minus recusandae dolores inventore nulla tempore. Nihil, vitae! Mollitia eaque doloremque temporibus. Et explicabo reprehenderit laborum, odit sapiente necessitatibus deserunt accusamus illum, maxime impedit tenetur a unde incidunt maiores nesciunt sequi ratione, commodi expedita modi. Quidem rerum molestiae, deleniti velit neque cupiditate quasi officia. Reiciendis doloribus rerum itaque a reprehenderit, vel quisquam nobis explicabo dolore, excepturi quis omnis? Ullam eos repudiandae odio cupiditate culpa accusantium.'
        // ]);
        // Post::create([
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum, assumenda illum tempore enim rerum, suscipit quidem delectus eligendi iste fugit unde reiciendis numquam quisquam et eos ad a. Voluptatibus rem voluptate commodi dolore omnis minus recusandae dolores inventore nulla tempore. Nihil, vitae! Mollitia eaque doloremque temporibus. Et explicabo reprehenderit laborum, odit sapiente necessitatibus deserunt accusamus illum, maxime impedit tenetur a unde incidunt maiores nesciunt sequi ratione, commodi expedita modi. Quidem rerum molestiae, deleniti velit neque cupiditate quasi officia. Reiciendis doloribus rerum itaque a reprehenderit, vel quisquam nobis explicabo dolore, excepturi quis omnis? Ullam eos repudiandae odio cupiditate culpa accusantium.'
        // ]);
        // Post::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum, assumenda illum tempore enim rerum, suscipit quidem delectus eligendi iste fugit unde reiciendis numquam quisquam et eos ad a. Voluptatibus rem voluptate commodi dolore omnis minus recusandae dolores inventore nulla tempore. Nihil, vitae! Mollitia eaque doloremque temporibus. Et explicabo reprehenderit laborum, odit sapiente necessitatibus deserunt accusamus illum, maxime impedit tenetur a unde incidunt maiores nesciunt sequi ratione, commodi expedita modi. Quidem rerum molestiae, deleniti velit neque cupiditate quasi officia. Reiciendis doloribus rerum itaque a reprehenderit, vel quisquam nobis explicabo dolore, excepturi quis omnis? Ullam eos repudiandae odio cupiditate culpa accusantium.'
        // ]);
        // Post::create([
        //     'category_id' => 3,
        //     'user_id' => 2,
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum, assumenda illum tempore enim rerum, suscipit quidem delectus eligendi iste fugit unde reiciendis numquam quisquam et eos ad a. Voluptatibus rem voluptate commodi dolore omnis minus recusandae dolores inventore nulla tempore. Nihil, vitae! Mollitia eaque doloremque temporibus. Et explicabo reprehenderit laborum, odit sapiente necessitatibus deserunt accusamus illum, maxime impedit tenetur a unde incidunt maiores nesciunt sequi ratione, commodi expedita modi. Quidem rerum molestiae, deleniti velit neque cupiditate quasi officia. Reiciendis doloribus rerum itaque a reprehenderit, vel quisquam nobis explicabo dolore, excepturi quis omnis? Ullam eos repudiandae odio cupiditate culpa accusantium.'
        // ]);
    }
}
