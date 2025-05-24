<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid py-4">

        {{-- INTESTAZIONE + NAVIGAZIONE MESE --}}
        <div class="calendar-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <a href="{{ route('reservations.monthly', ['year' => $startOfMonth->copy()->subMonth()->year, 'month' => $startOfMonth->copy()->subMonth()->month]) }}"
                    class="btn btn-nav">
                    <i class="bi bi-chevron-left me-2"></i>
                    <span class="d-none d-sm-inline">Mese precedente</span>
                    <span class="d-sm-none">Prec.</span>
                </a>

                <div class="month-title">
                    <h1 class="mb-0">{{ $startOfMonth->translatedFormat('F Y') }}</h1>
                    <div class="month-subtitle">Calendario Prenotazioni</div>
                </div>

                <a href="{{ route('reservations.monthly', ['year' => $startOfMonth->copy()->addMonth()->year, 'month' => $startOfMonth->copy()->addMonth()->month]) }}"
                    class="btn btn-nav">
                    <span class="d-none d-sm-inline">Mese successivo</span>
                    <span class="d-sm-none">Succ.</span>
                    <i class="bi bi-chevron-right ms-2"></i>
                </a>
            </div>
        </div>

        {{-- FORM MESE E ANNO --}}
        <div class="calendar-form-wrapper mb-4">
            <x-calendar-form :start-of-month="$startOfMonth" />
        </div>

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
                                <div class="floor-section mb-5">
                                    <div class="floor-header">
                                        <h3 class="floor-title">
                                            <i class="bi bi-building me-2"></i>
                                            {{ $floorName }}
                                            <span class="room-count">({{ $floorRooms->count() }} camere)</span>
                                        </h3>
                                    </div>

                                    <div class="calendar-table-wrapper">
                                        <div class="table-responsive">
                                            <table class="calendar-table">
                                                <thead>
                                                    <tr>
                                                        <th class="room-header sticky-column">
                                                            <i class="bi bi-door-open me-1"></i>
                                                            Camera
                                                        </th>
                                                        @for ($day = 1; $day <= $daysInMonth; $day++)
                                                            @php
                                                            $currentDate=$startOfMonth->copy()->day($day);
                                                            $isWeekend = $currentDate->isWeekend();
                                                            $isToday = $currentDate->isToday();
                                                            @endphp
                                                            <th class="day-header {{ $isWeekend ? 'weekend' : '' }} {{ $isToday ? 'today' : '' }}">
                                                                <div class="day-number">{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</div>
                                                                <div class="day-name">{{ $currentDate->translatedFormat('D') }}</div>
                                                            </th>
                                                            @endfor
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($floorRooms as $room)
                                                    <tr class="room-row">
                                                        <td class="room-cell sticky-column">
                                                            <div class="room-number">{{ $room->room_number }}</div>
                                                            <div class="room-type">{{ $room->room_type ?? 'Standard' }}</div>
                                                        </td>
                                                        @for ($day = 1; $day <= $daysInMonth; $day++)
                                                            @php
                                                            $currentDate=$startOfMonth->copy()->day($day)->format('Y-m-d');
                                                            $reservation = $room->reservations->first(fn($res) =>
                                                            $currentDate >= $res->check_in && $currentDate < $res->check_out
                                                                );
                                                                $isWeekend = $startOfMonth->copy()->day($day)->isWeekend();
                                                                $isToday = $startOfMonth->copy()->day($day)->isToday();
                                                                @endphp
                                                                @if ($reservation)
                                                                <td class="reservation-cell occupied {{ $isToday ? 'today' : '' }}"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Cliente: {{ $reservation->client->firstname }} {{ $reservation->client->lastname }}&#10;Check-in: {{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}&#10;Check-out: {{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}">
                                                                    <div class="guest-name">
                                                                        {{ Str::limit($reservation->client->firstname . ' ' . $reservation->client->lastname, 10) }}
                                                                    </div>
                                                                    <div class="reservation-status">
                                                                        <i class="bi bi-person-check"></i>
                                                                    </div>
                                                                </td>
                                                                @else
                                                                <td class="reservation-cell available {{ $isWeekend ? 'weekend' : '' }} {{ $isToday ? 'today' : '' }}">
                                                                    <div class="available-indicator">
                                                                        <i class="bi bi-plus-circle"></i>
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                @endfor
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- LEGENDA --}}
                                <div class="calendar-legend">
                                    <h5 class="legend-title">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Legenda
                                    </h5>
                                    <div class="legend-items">
                                        <div class="legend-item">
                                            <div class="legend-color occupied"></div>
                                            <span>Camera occupata</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color available"></div>
                                            <span>Camera disponibile</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color weekend"></div>
                                            <span>Weekend</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color today"></div>
                                            <span>Oggi</span>
                                        </div>
                                    </div>
                                </div>

    </div>
</x-main>