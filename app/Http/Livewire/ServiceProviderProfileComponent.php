<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceProvider;

class ServiceProviderProfileComponent extends Component
{
    public $providerId;
    public $provider;

    public function mount($providerId)
    {
        $this->providerId = $providerId;
        $this->provider = ServiceProvider::with('services', 'reviews')->findOrFail($providerId);
    }

    public function render()
    {
        return view('livewire.service-provider-profile-component', [
            'provider' => $this->provider,
        ]);
    }
}
