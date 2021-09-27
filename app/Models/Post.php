<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public  $title ;
    public  $excerpt ;
    public  $date ;
    public  $body ;
    public  $slug ;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){
            return collect(File::files(resource_path("posts/")))->map(function ($file) {

                $doc = YamlFrontMatter::parseFile(($file));
                return new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body(),
                    $doc->slug

                );
            });
        });

    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
