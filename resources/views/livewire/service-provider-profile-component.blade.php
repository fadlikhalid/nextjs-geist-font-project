<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $provider->name }}</h1>
    <p class="mb-4 text-gray-700">{{ $provider->bio }}</p>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Services Offered</h2>
        <ul class="list-disc list-inside">
            @foreach ($provider->services as $service)
                <li>
                    <span class="font-semibold">{{ $service->category }}:</span> {{ $service->description }} - RM{{ number_format($service->price, 2) }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Availability</h2>
        <p>{{ $provider->availability ?? 'Not specified' }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Reviews</h2>
        @if ($provider->reviews->count() > 0)
            <ul class="space-y-4">
                @foreach ($provider->reviews as $review)
                    <li class="border p-4 rounded shadow">
                        <p class="font-semibold">{{ $review->user->name }}</p>
                        <p>Rating: {{ $review->rating }} / 5</p>
                        <p>{{ $review->comment }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No reviews yet.</p>
        @endif
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Book Now</button>
</div>
