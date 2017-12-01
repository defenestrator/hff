<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use App\Post;
use App\Showcase;

class PublicationsController extends Controller
{
    protected $post;
    protected $showcase;

    public function __construct(Post $post, Showcase $showcase)
    {
        $this->post     = $post;
        $this->showcase = $showcase;
    }

    /**
     * @return array
     */
    public function index()
    {
        $posts = $this->post->published();
        $unpublished_posts = $this->post->unPublished();
        $showcases = $this->showcase->published();
        $unpublished_showcases = $this->showcase->unPublished();
        return view('cms.publications', compact('posts', 'showcases', 'unpublished_posts', 'unpublished_showcases'));
    }

    /**
     * @return array
     */
    public function get()
    {
        $posts = $this->post->published();
        $unpublished_posts = $this->post->unPublished();
        $showcases = $this->showcase->published();
        $unpublished_showcases = $this->showcase->unPublished();
        return compact('posts', 'showcases', 'unpublished_posts', 'unpublished_showcases');
    }
    /**
     * @param Request $request
     * @param Publication $publication
     * @return mixed
     */
    public function create(Request $request, Publication $publication)
    {
        $request->validate([
            'type' => 'required|min:2'
        ]);

        return $publication->create($request->all([]));
    }

    /**
     * @param Publication $publication
     * @param $id
     * @return int
     */
    public function destroy(Publication $publication, $id)
    {
        return $publication->destroy($id);
    }
    /**
     * @param Publication $publication
     * @param $id
     * @return int
     */
    public function destroyByShowcaseId(Publication $publication, $id)
    {
        $zombie = $publication->where('showcase_id', '=', $id)->get();
        return $publication->destroy($zombie->pluck('id'));
    }
    /**
     * @param Publication $publication
     * @param $id
     * @return int
     */
    public function destroyByPostId(Publication $publication, $id)
    {
        $zombie = $publication->where('post_id', '=', $id)->get();
        return $publication->destroy($zombie->pluck('id'));
    }
}
