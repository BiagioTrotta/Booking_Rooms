<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Gestione degli errori --}}
    @if ($errors->any())
    <x-error-messages :errors="$errors" />
    @endif

    {{-- Messaggio di successo --}}
    @if (session('success'))
    <x-success-notice :message="session('success')" />
    @endif

    {{-- Form per la creazione di una nuova prenotazione --}}
    <x-reservation-form :clients="$clients" :rooms="$rooms" />

    {{-- Filtri e visualizzazione delle prenotazioni --}}
    <x-reservation-filter :clients="$clients" :rooms="$rooms" :reservations="$reservations" :selectedClient="$selectedClient" :selectedRoom="$selectedRoom" :dateRange="$dateRange" />

    {{-- Script per l'inizializzazione di Flatpickr --}}
    <x-flatpickr-script />

</x-main>