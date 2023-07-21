<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PostIndex extends Component
{
    use WithPagination;

    public $search;
    public $category;

    public function render()
    {
        SEOMeta::setTitle('Blog - Devcentric Studio');
        SEOMeta::setDescription('Explore our blog for tech-related topics and stay updated with the latest industry trends.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Explore our blog for tech-related topics and stay updated with the latest industry trends.');
        OpenGraph::setTitle('Blog - Devcentric Studio');
       

        OpenGraph::setUrl(url()->current());

        TwitterCard::setTitle('Devcentric Studio - Blog');
        TwitterCard::setSite('@devcentricstudio');

        JsonLd::setTitle('Devcentric Studio - Blog');
        JsonLd::setDescription('Explore the latest tech-related articles and blog posts on Devcentric Studio. Stay updated with industry trends and insights.');
        
        $posts = Post::when($this->search, function ($query) {
            $query->where('title', 'like', '%'.$this->search.'%')
                  ->orWhere('content', 'like', '%'.$this->search.'%');
        })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->latest()
            ->paginate(10);

        $categories = Category::all();

        return view('livewire.post-index', [
            'posts' => $posts,
            'categories' => $categories,
        ])->layout('layouts.guest');
    }


}
