<form method="GET" action="{{ route('reservations.monthly') }}" class="mb-4">
    <div class="row row-cols-1 row-cols-sm-auto g-3 align-items-end justify-content-center">
        {{-- Select Mese --}}
        <div class="col">
            <label for="month" class="form-label">Mese</label>
            <select id="month" name="month" class="form-select">
                @for ($m = 1; $m <= 12; $m++)
                    @php
                    $date=\Carbon\Carbon::createFromDate(null, $m, 1);
                    $monthName=$date->translatedFormat('F');
                    @endphp
                    <option value="{{ $m }}" {{ $m == $startOfMonth->month ? 'selected' : '' }}>
                        {{ ucfirst($monthName) }}
                    </option>
                    @endfor
            </select>
        </div>

        {{-- Select Anno --}}
        <div class="col">
            <label for="year" class="form-label">Anno</label>
            <select id="year" name="year" class="form-select">
                @for ($y = now()->year - 2; $y <= 2029; $y++)
                    <option value="{{ $y }}" {{ $y == $startOfMonth->year ? 'selected' : '' }}>
                    {{ $y }}
                    </option>
                    @endfor
            </select>
        </div>

        {{-- Pulsante --}}
        <div class="col">
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-calendar3"></i> Visualizza
            </button>
        </div>
    </div>
</form>