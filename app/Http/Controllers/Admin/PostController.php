<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PostFormFields;
use App\Http\Requests;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;

class PostController extends Controller
{

    protected $formFields;

    public function __construct(PostFormFields $formFields)
    {
        $this->formFields = $formFields;
    }

    /**
      * Display a listing of the posts.
      *
      * @return Response
      */
    public function index()
    {
        return view('admin.post.index')
                        ->withPosts(Post::all());
    }

    /**
     * Show the new post form
     */
    public function create()
    {
        $data = $this->formFields->formFields();

        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created Post
     *
     * @param PostCreateRequest $request
     */
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        
        $post->syncTags($request->get('tags', []));

        return redirect('/admin/post')
                        ->withSuccess('New Post Successfully Created.');
    }

    /**
     * Show the post edit form
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->formFields->formFields($id);

        return view('admin.post.edit', $data);
    }

    /**
     * Update the Post
     *
     * @param PostUpdateRequest $request
     * @param int $id
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                            ->back()
                            ->withSuccess('Post saved.');
        }

        return redirect('/admin/post')
                        ->withSuccess('Post saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect('/admin/post')
                        ->withSuccess('Post deleted.');
    }
}
