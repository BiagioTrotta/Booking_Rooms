<x-main>
    <x-slot:title>Users</x-slot:title>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-5 mt-4">
                <livewire:user-form />
            </div>
            <div class="col-12 col-lg-7 mt-4">
                <livewire:user-list />
            </div>
        </div>
    </div>
</x-main>