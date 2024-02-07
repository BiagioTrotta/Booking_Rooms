<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <livewire:client-create />
            </div>
            <div class="col-6">
                <livewire:client-list />
            </div>
        </div>
    </div>
</x-main>