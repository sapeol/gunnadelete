<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $posts =  collect(File::files(resource_path("posts/")))->map(function ($file) {

        $doc = YamlFrontMatter::parseFile(($file));
        return new Post(
            $doc->title,
            $doc->excerpt,
            $doc->date,
            $doc->body(),
            $doc->slug

        );
    });


    //    ddd($posts[0]->title);


    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($slug) {
    // FIND A POST BNY ITS SLUG AND PASS IT  TO VIEW CALLED SLUG

    return view('post', [
        'post' =>  Post::find($slug)
    ]);
});
