<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
            'name'=> 'Badru Salam',
            'username'=> 'badrusalam11',
            'email'=>'badrusalam760@gmail.com',
            'password' => bcrypt('password'),
            ]) ;
        User::factory(5)->create();
            
        // // User::create([
        // //     'name' => 'Dodi',
        // //     'email' => 'Dodi@gmail.com',
        // //     'password' => bcrypt('12345'),
        // // ]);
        // Category::factory(5)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'General',
            'slug' => 'general'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
        // Post::create([
        //     'title'=> 'Judul Pertama',
        //     'category_id'=>1,
        //     'user_id'=> 1,
        //     'slug' => 'judul-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, fugit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<p></p> Non harum minus magnam id debitis in odio assumenda. Libero eum quos error ex porro ratione architecto provident sit omnis, a voluptates?'
        // ]) ;

        // Post::create([
        //     'title'=> 'Judul Kedua',
        //     'category_id'=>3,
        //     'user_id'=> 1,
        //     'slug' => 'judul-kedua',
        //     'excerpt'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, fugit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<p></p> Non harum minus magnam id debitis in odio assumenda. Libero eum quos error ex porro ratione architecto provident sit omnis, a voluptates?'
        // ]) ;

        // Post::create([
        //     'title'=> 'Judul ketiga',
        //     'category_id'=>3,
        //     'user_id'=> 1,
        //     'slug' => 'judul-ketiga',
        //     'excerpt'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, fugit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<p></p> Non harum minus magnam id debitis in odio assumenda. Libero eum quos error ex porro ratione architecto provident sit omnis, a voluptates?'
        // ]) ;

        // Post::create([
        //     'title'=> 'Judul Keempat',
        //     'category_id'=>2,
        //     'user_id'=> 2,
        //     'slug' => 'judul-keempat',
        //     'excerpt'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, fugit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<p></p> Non harum minus magnam id debitis in odio assumenda. Libero eum quos error ex porro ratione architecto provident sit omnis, a voluptates?'
        // ]) ;

    }
}
