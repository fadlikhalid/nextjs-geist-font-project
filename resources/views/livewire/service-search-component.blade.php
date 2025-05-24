<div class="p-4 max-w-7xl mx-auto">
    <div class="mb-6">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search services or providers..." class="w-full p-2 border rounded">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <select wire:model="category" class="p-2 border rounded">
            <option value="">All Categories</option>
            <option value="plumbing">Plumbing</option>
            <option value="handyman">Handyman</option>
            <option value="cleaning">Cleaning</option>
            <option value="maid">Maid Services</option>
            <option value="cooking_gas">Cooking Gas Delivery</option>
        </select>

        <input type="text" wire:model.debounce.500ms="location" placeholder="Location" class="p-2 border rounded">

        <select wire:model="rating" class="p-2 border rounded">
            <option value="">All Ratings</option>
            <option value="1">1 star &amp; up</option>
            <option value="2">2 stars &amp; up</option>
            <option value="3">3 stars &amp; up</option>
            <option value="4">4 stars &amp; up</option>
            <option value="5">5 stars</option>
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($serviceProviders as $provider)
            <div class="border rounded p-4 shadow hover:shadow-lg transition">
                <h3 class="text-lg font-semibold mb-2">{{ $provider->name }}</h3>
                <p class="text-sm mb-1">Location: {{ $provider->location }}</p>
                <p class="text-sm mb-1">Average Rating: {{ number_format($provider->average_rating, 1) ?? 'N/A' }}</p>
                <a href="{{ route('provider.profile', $provider->id) }}" class="text-blue-600 hover:underline">View Profile</a>
            </div>
        @empty
            <p>No service providers found.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $serviceProviders->links() }}
    </div>
</div>
