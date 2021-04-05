<?php

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::get()->pluck('id');
        $category = Category::get()->pluck('id');
        //Blog::truncate();
        $blog = Blog::create([
            'school_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'photo' => 'storage/gallery1.jpg',
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
        ]);
        $blog->assignTags($tag);
        $blog->assignCategories($category);

        $bloga = Blog::create([
            'school_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'photo' => 'storage/gallery1.jpg',
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
        ]);
        $bloga->assignTags($tag);
        $bloga->assignCategories($category);

        $blogb = Blog::create([
            'school_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug('Pensuh school inter house sport week'),
            'photo' => 'storage/gallery1.jpg',
            'name' => 'Pensuh school inter house sport week',
            'excerpt' => ' school inter house sport week',
            'body' => 'Organizing your school Inter House sports competition is like organizing a Mini Olympic games. It is time to impress the parents and make them feel proud of their children\'s school.',
        ]);
        $blogb->assignTags($tag);
        $blogb->assignCategories($category);




    }
}
