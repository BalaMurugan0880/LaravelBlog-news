<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = role::where('name', 'Admin')->first();
        $editorRole = role::where('name', 'Editor')->first();
        $writerRole = role::where('name', 'Writer')->first();

        $admin = User::create([
        	'name' => 'Admin User',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('password'),
            'role' => 'Admin',
            'biographical' => 'Manuel Iglesias draws from his life story when writing about the experiences of migrant workers. His first series of poems, My Fathers Hands, appeared in The New Yorker and describes how his family crossed the Texas border to give Manuel and his brothers a better life. After receiving his Masters in Fine Arts from Columbia University, Manuel wrote three nonfiction novels about his experiences, including Under the Streaming Sun, which earned the National Prize for Arts and Sciences in 2008. Manuel is currently working on a collection of fictional short stories to be published in early 2021.',
            'profilepic' => 'http://127.0.0.1:8000/storage/galleries/image2_1615356569.jpg',
            'instagram' => 'www.instagram.com',
            'facebook' => 'https://www.facebook.com/BrickfieldsAsiaCollege.BAC/',
        	'email_verified_at' =>  now(),
        ]);

         $editor = User::create([
        	'name' => 'Editor User',
        	'email' => 'editor@editor.com',
        	'password' => Hash::make('password'),
             'biographical' => 'Manuel Iglesias draws from his life story when writing about the experiences of migrant workers. His first series of poems, My Fathers Hands, appeared in The New Yorker and describes how his family crossed the Texas border to give Manuel and his brothers a better life. After receiving his Masters in Fine Arts from Columbia University, Manuel wrote three nonfiction novels about his experiences, including Under the Streaming Sun, which earned the National Prize for Arts and Sciences in 2008. Manuel is currently working on a collection of fictional short stories to be published in early 2021.',
            'profilepic' => 'http://127.0.0.1:8000/storage/galleries/image2_1615356569.jpg',
            'instagram' => 'www.instagram.com',
            'facebook' => 'https://www.facebook.com/BrickfieldsAsiaCollege.BAC/',
            'role' => 'Editor',
        	'email_verified_at' =>  now(),
        ]);

         $writer = User::create([
            'name' => 'Writer User',
            'email' => 'writer@writer.com',
            'password' => Hash::make('password'),
            'biographical' => 'Manuel Iglesias draws from his life story when writing about the experiences of migrant workers. His first series of poems, My Fathers Hands, appeared in The New Yorker and describes how his family crossed the Texas border to give Manuel and his brothers a better life. After receiving his Masters in Fine Arts from Columbia University, Manuel wrote three nonfiction novels about his experiences, including Under the Streaming Sun, which earned the National Prize for Arts and Sciences in 2008. Manuel is currently working on a collection of fictional short stories to be published in early 2021.',
            'profilepic' => 'http://127.0.0.1:8000/storage/galleries/image2_1615356569.jpg',
            'instagram' => 'www.instagram.com',
            'facebook' => 'https://www.facebook.com/BrickfieldsAsiaCollege.BAC/',
            'role' => 'Writer',
            'email_verified_at' =>  now(),
        ]);

         $admin->roles()->attach($adminRole);
         $editor->roles()->attach($editorRole);
         $writer->roles()->attach($writerRole);
    }
}
