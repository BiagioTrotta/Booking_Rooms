<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container py-4">

        {{-- INTESTAZIONE + NAVIGAZIONE MESE --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <a href="{{ route('reservations.monthly', ['month' => $previousMonth]) }}" class="btn btn-outline-secondary">
                <i class="bi bi-chevron-left"></i> Mese precedente
            </a>

            <h2 class="m-0 text-center flex-grow-1">{{ $startOfMonth->translatedFormat('F Y') }}</h2>

            <a href="{{ route('reservations.monthly', ['month' => $nextMonth]) }}" class="btn btn-outline-secondary">
                Mese successivo <i class="bi bi-chevron-right"></i>
            </a>
        </div>

        {{-- FORM MESE E ANNO --}}
        <x-calendar-form :start-of-month="$startOfMonth" />


        @php
        $floors = [
        'Primo piano' => $rooms->filter(fn($room) => $room->room_number >= 101 && $room->room_number <= 112), 'Secondo piano'=> $rooms->filter(fn($room) => $room->room_number >= 201 && $room->room_number <= 211), 'Terzo piano'=> $rooms->filter(fn($room) => $room->room_number >= 301 && $room->room_number <= 311), 'Esterno'=> $rooms->filter(fn($room) =>
                    $room->room_number < 101 ||
                        ($room->room_number > 112 && $room->room_number < 201) ||
                            ($room->room_number > 211 && $room->room_number < 301) ||
                                $room->room_number > 311),
                                ];
                                @endphp

                                {{-- TABELLE PER PIANO --}}
                                @foreach ($floors as $floorName => $floorRooms)
                                <h3 class="mt-4">{{ $floorName }}</h3>
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered table-striped text-center table-sm align-middle">
                                        <thead class="table-primary sticky-top">
                                            <tr>
                                                <th style="min-width: 80px;" class="sticky-column">Camera</th>
                                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                                    <th style="min-width: 40px;">{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</th>
                                                    @endfor
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($floorRooms as $room)
                                            <tr>
                                                <td class="sticky-column bg-white" style="font-weight: bold;">{{ $room->room_number }}</td>
                                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                                    @php
                                                    $currentDate=$startOfMonth->copy()->day($day)->format('Y-m-d');
                                                    $reservation = $room->reservations->first(fn($res) =>
                                                    $currentDate >= $res->check_in && $currentDate <= $res->check_out
                                                        );
                                                        @endphp
                                                        @if ($reservation)
                                                        <td class="bg-success text-white px-1" style="font-size: 0.75rem;">
                                                            {{ Str::limit($reservation->client->firstname . ' ' . $reservation->client->lastname, 12) }}
                                                        </td>
                                                        @else
                                                        <td class="bg-light"></td>
                                                        @endif
                                                        @endfor
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach

    </div>

    <!-- CSS Styles -->
    @vite(['resources/css/calendar.css'])
</x-main>