<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 mt-4">
                <livewire:client-create />
            </div>
            <div class="col-12 col-lg-7 mt-4">
                <livewire:client-list />
            </div>
        </div>
    </div>
</x-main>