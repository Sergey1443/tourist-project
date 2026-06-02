<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Админ-панель</h1>
                    
                    <form method="GET" class="mb-4">
                        <select name="tour_id" class="border rounded px-2 py-1">
                            <option value="">Все туры</option>
                            @foreach($tours as $tour)
                                <option value="{{ $tour->id }}" {{ request('tour_id') == $tour->id ? 'selected' : '' }}>
                                    {{ $tour->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Фильтр</button>
                    </form>
                    
                    <table class="w-full border">
                        <thead>
                            <tr>
                                <th class="border p-2">Пользователь</th>
                                <th class="border p-2">Тур</th>
                                <th class="border p-2">Дата</th>
                                <th class="border p-2">Мест</th>
                                <th class="border p-2">Цена</th>
                                <th class="border p-2">Итого</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="border p-2">{{ $booking->user->lastname }} {{ $booking->user->name }}</td>
                                <td class="border p-2">{{ $booking->tour->name }}</td>
                                <td class="border p-2">{{ $booking->tour->date->format('d.m.Y') }}</td>
                                <td class="border p-2">{{ $booking->places }}</td>
                                <td class="border p-2">{{ number_format($booking->tour->price) }} руб.</td>
                                <td class="border p-2">{{ number_format($booking->total_price) }} руб.</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>