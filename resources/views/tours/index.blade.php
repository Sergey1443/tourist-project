<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-8">Туры по региону</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($tours as $tour)
                            <div class="border rounded-lg overflow-hidden shadow-lg">
                                <img src="{{ asset('images/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-bold text-xl mb-2">{{ $tour->name }}</h3>
                                    <p class="text-gray-600 mb-2">Дата: {{ \Carbon\Carbon::parse($tour->date)->format('d.m.Y') }}</p>
                                    <p class="text-red-600 font-bold text-lg mb-4">{{ number_format($tour->price) }} руб.</p>
                                    
                                    @auth
                                        <a href="{{ route('tours.create', $tour) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full block text-center">
                                            Забронировать
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-full block text-center">
                                            Войдите чтобы забронировать
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>