<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Rey Borres',
            'email' => 'jrborres@gmail.com',
            'password' => bcrypt('secret'),
            'age' => 26,
            'is_admin' => true,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Daisy Borres',
            'email' => 'daisyborres@gmail.com',
            'password' => bcrypt('secret'),
            'age' => 18,
            'is_admin' => false,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Shyraine Borres',
            'email' => 'shyborres@gmail.com',
            'password' => bcrypt('secret'),
            'age' => 10,
            'is_admin' => false,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('books')->insert([
            'title' => 'The Grass',
            'isbn' => '1-86092-049-7',
            'author' => 'JK Rowling',
            'quantity' => 10,
            'shelf_location' => 'Shelf  A',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('books')->insert([
           'title' => 'The Higgler',
            'isbn' => '1-86092-010-1',
            'author' => 'Warrent Buffet',
            'quantity' => 15,
            'shelf_location' => 'Shelf  B',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('books')->insert([
           'title' => 'The Open Boat',
            'isbn' => '1-86092-034-9',
            'author' => 'Sebastian Marco',
            'quantity' => 5,
            'shelf_location' => 'Shelf  C',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
