<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Services\BlogIndexData;

use App\Mail\TestShipped;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    protected $indexData;

    public function __construct(BlogIndexData $indexData)
    {
        $this->indexData = $indexData;
    }

    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->indexData->indexData($tag);
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag', 'slug'));
    }
}
