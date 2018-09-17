<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 30)->create();

        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Post::class, 30)->create()->each(function($post) {

    		$link = str_random(12) . '.jpg';
    		$file = file_get_contents('http://picsum.photos/250/250?image=' . rand(1, 9));
            Storage::disk('local')->put($link, $file);
            $post->picture()->create([
                'link' => $link
            ]);
            $post->save();

    	});
    }

}
