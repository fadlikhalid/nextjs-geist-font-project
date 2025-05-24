<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;
use App\Models\Service;

class ServiceSearchComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $location = '';
    public $rating = '';

    protected $updatesQueryString = ['search', 'category', 'location', 'rating'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function updatingRating()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = ServiceProvider::query();

        if ($this->search) {
            $query = $query->where('name', 'like', '%'.$this->search.'%');
        }

        if ($this->category) {
            $query = $query->whereHas('services', function ($q) {
                $q->where('category', $this->category);
            });
        }

        if ($this->location) {
            $query = $query->where('location', 'like', '%'.$this->location.'%');
        }

        if ($this->rating) {
            $query = $query->where('average_rating', '>=', $this->rating);
        }

        $serviceProviders = $query->paginate(10);

        return view('livewire.service-search-component', [
            'serviceProviders' => $serviceProviders,
        ]);
    }
}
