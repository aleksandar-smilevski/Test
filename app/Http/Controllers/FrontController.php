<?php

namespace App\Http\Controllers;

use App\Post;
use Geocoder\Geocoder;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        return view('blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog'));
    }

    public function index(){
        $ip = \Request::ip();
        //dd($ip);
        $loc = app('geocoder')->geocode($ip)->get();
        dd($loc);
    }

    public function test(){
        //dd($ip);
        $geocode = Geocoder::geocode("Tanzania")->toArray();
        return Response::json($geocode);
        return response()->json(app('geocoder')->geocode('Skopje')->get());
    }

    public function blog_post($url) {
        $post = Post::whereUrl($url)->first();

        $tags = $post->tags;
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $brands = $this->brands;
        $categories = $this->categories;
        $products = $this->products;

        $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'categories', 'products');

        return view('blog_post', $data);
    }
}
