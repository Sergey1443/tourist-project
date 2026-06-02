<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Бронирование тура</h2>
                    
                    <div class="mb-6 p-4 bg-gray-100 rounded">
                        <h3 class="font-bold text-xl">{{ $tour->name }}</h3>
                        <p>Дата тура: {{ \Carbon\Carbon::parse($tour->date)->format('d.m.Y') }}</p>
                        <p>Цена за место: {{ number_format($tour->price) }} руб.</p>
                    </div>
                    
                    <form method="POST" action="{{ route('tours.store', $tour) }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="places" class="block text-gray-700 font-bold mb-2">Количество мест</label>
                            <input type="number" name="places" id="places" class="w-full border rounded px-3 py-2" min="1" value="1" required>
                            @error('places')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('tours.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Назад</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Забронировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>