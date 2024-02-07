<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-4">
        <h2>Seleziona Mese e Anno</h2>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="month">Mese:</label>
                <input type="month" id="month" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="year">Anno:</label>
                <input type="number" id="year" class="form-control" min="2022" max="2100" value="{{ date('Y') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" onclick="getReservations()">Visualizza</button>
            </div>
        </div>

        <h2>Prenotazioni</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numero Camera</th>
                        <!-- Intestazioni per i giorni del mese -->
                        @for ($day = 1; $day <= 31; $day++) <th>{{ $day }}</th>
                            @endfor
                    </tr>
                </thead>
                <tbody id="reservationsBody">
                    <!-- Qui verranno visualizzati i dati delle prenotazioni -->
                </tbody>
            </table>
        </div>
    </div>





    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function getReservations() {
            const month = document.getElementById('month').value.split('-')[1];
            const year = document.getElementById('year').value;

            fetch(`/api/prenotazioni?month=${month}&year=${year}`)
                .then(response => response.json())
                .then(data => {
                    const reservationsBody = document.getElementById('reservationsBody');
                    reservationsBody.innerHTML = '';

                    const daysInMonth = new Date(year, month, 0).getDate();

                    for (let room = 101; room <= 311; room += 100) {
                        const row = document.createElement('tr');
                        row.innerHTML = `<td>${room}</td>`;

                        for (let day = 1; day <= daysInMonth; day++) {
                            const cell = document.createElement('td');
                            const isBooked = data[room] ? data[room][day] : false;

                            if (isBooked) {
                                cell.style.backgroundColor = 'green'; // Camera prenotata
                            } else {
                                cell.style.backgroundColor = 'gray'; // Camera disponibile
                            }

                            row.appendChild(cell);
                        }

                        reservationsBody.appendChild(row);
                    }
                })
                .catch(error => console.error('Errore durante il recupero delle prenotazioni:', error));
        }
    </script>



</x-main>