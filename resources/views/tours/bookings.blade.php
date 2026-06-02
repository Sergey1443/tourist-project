<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Мои бронирования</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @forelse($bookings as $booking)
                        <div class="border-b border-gray-200 py-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="font-bold">{{ $booking->tour->name }}</h3>
                                    <p>Дата: {{ $booking->tour->date->format('d.m.Y') }}</p>
                                    <p>Мест: {{ $booking->places }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-red-600">{{ number_format($booking->total_price) }} руб.</p>
                                    <p class="text-sm">Забронировано: {{ $booking->created_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>У вас пока нет бронирований</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>