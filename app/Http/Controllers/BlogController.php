<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Services\BlogIndexData;
use App\Services\RssFeed;
use App\Services\SiteMap;

use App\Mail\TestShipped;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    protected $indexData;

    public function __construct(BlogIndexData $indexData)
    {
        $this->indexData = $indexData;
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->indexData->indexData($tag);
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);
    }

    /**
     * Display a post.
     *
     * @return Response
     */
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag', 'slug'));
    }

    /**
     * RSS
     *
     * @return Response
     */
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)
          ->header('Content-type', 'application/rss+xml');
    }

    /**
     * siteMap
     *
     * @return Response
     */
    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
          ->header('Content-type', 'text/xml');
    }
}
