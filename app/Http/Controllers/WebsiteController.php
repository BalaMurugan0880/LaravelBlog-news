<?php

namespace App\Http\Controllers;

use App\Mail\VisitorContact;
use App\Post;
use App\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
class WebsiteController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('BAC Blog & News');
        SEOMeta::setDescription('One destination for all stuff');
        SEOMeta::setCanonical('https://www.bac.edu.my/');

        OpenGraph::setDescription('One destination for all stuff');
        OpenGraph::setTitle('BAC Blog & News');
        OpenGraph::setUrl('https://www.bac.edu.my/');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('BAC Blog & News');
        TwitterCard::setSite('@BAC');


        JsonLd::setTitle('BAC Blog & News');
        JsonLd::setDescription('One destination for all stuff');
        JsonLd::addImage('https://www.bac.edu.my/wp-content/uploads/2018/10/b4l.png');
        

        $categories = Category::orderBy('category_name', 'ASC')->where('is_published', '1')->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->paginate(5);
        $mostpopular = Post::get()->sortByDesc('views')->take(3);
        $recentpost = Post::get()->sortByDesc('created_at')->take(3);
        return view('website.index', compact('posts', 'categories','mostpopular','recentpost'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();
        if ($post) {

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->details);
        SEOMeta::addMeta('post:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addKeyword($post->sub_title);

        OpenGraph::setDescription($post->details);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl('http://127.0.0.1:8000/post/'.$post->slug);
        OpenGraph::addProperty('type', 'post');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage($post->thumbnail);
        
        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->details);
        JsonLd::setType('Article');
        JsonLd::addImage($post->thumbnail);

            DB::table('posts')->where('slug', $slug)->increment('views');

            return view('website.post', compact('post'));
        } else {
            return \Response::view('website.errors.404', array(), 404);
        }
    }

    public function category($slug)
    {
        $category = Category::where('category_slug', $slug)->where('is_published', '1')->first();
        if ($category) {
            $posts = $category->posts()->orderBy('posts.id', 'DESC')->where('is_published', '1')->paginate(5);
            return view('website.category', compact('category', 'posts'));
        } else {
            return \Response::view('website.errors.404', array(), 404);
        }
    }

    public function page($slug)
    {
        $page = Post::where('slug', $slug)->where('post_type', 'page')->where('is_published', '1')->first();
        if ($page) {
            return view('website.page', compact('page'));
        } else {
            return \Response::view('website.errors.404', array(), 404);
        }
    }

    public function showContactForm()
    {
        return view('website.contact');
    }

    public function submitContactForm(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'message' => $request->message,
        ];

        Mail::to('youremailaddress.@gmail.com')->send(new VisitorContact($data));

        Session::flash('message', 'Thank you for your email');
        return redirect()->route('contact.show');
    }
}
