<x-app-layout>
    <div class="py-4 sm:py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 text-gray-900">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-4 sm:mb-6 md:mb-8 text-center">Туры по региону</h1>
                    
                    <!-- Адаптивная сетка: 1 колонка на телефоне, 2 на планшете, 3 на десктопе -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                        @foreach($tours as $tour)
                            <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                                <img src="{{ asset('images/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-full h-36 sm:h-48 object-cover">
                                <div class="p-3 sm:p-4">
                                    <h3 class="font-bold text-sm sm:text-base md:text-lg mb-1">{{ $tour->name }}</h3>
                                    <p class="text-gray-600 text-xs sm:text-sm mb-1">Дата: {{ \Carbon\Carbon::parse($tour->date)->format('d.m.Y') }}</p>
                                    <p class="text-red-600 font-bold text-sm sm:text-base md:text-lg mb-2 sm:mb-4">{{ number_format($tour->price) }} руб.</p>
                                    
                                    @auth
                                        <a href="{{ route('tours.create', $tour) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 sm:py-2 px-2 sm:px-4 rounded w-full block text-center text-xs sm:text-sm">
                                            Забронировать
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1.5 sm:py-2 px-2 sm:px-4 rounded w-full block text-center text-xs sm:text-sm">
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