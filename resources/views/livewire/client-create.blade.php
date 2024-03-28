<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            @if($client)
            <h2>Modifica Cliente <i class="fa-solid fa-user"></i></h2>
            @else
            <h2>Aggiungi Cliente <i class="fa-solid fa-user"></i></h2>
            @endif
        </div>

        <div class="col-12">
            <x-session-alerts />
        </div>

        <form wire:submit.prevent="createClient" class="bg-white rounded shadow mt-2 pt-2">
            <div class="form-group">
                <button class="btn btn-sm btn-dark" wire:click="newClient"><i class="fa-solid fa-plus"></i> Nuovo Cliente</button>
            </div>
            <div class="form-group">
                <label for="lastname">Cognome:</label>
                <input type="text" wire:model="lastname" class="form-control" id="lastname">
                @error('lastname') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="firstname">Nome:</label>
                <input type="text" wire:model="firstname" class="form-control" id="firstname">
                @error('firstname') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" wire:model="email" class="form-control" id="email">
                @error('email') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefono:</label>
                <input type="number" wire:model="phone" class="form-control" id="phone">
                @error('phone') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <!-- Collapse Dettails -->
            <p class="form-group mt-3">
                <button class="btn btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-regular fa-circle-down"></i> Aggiungi Dati
                </button>
            </p>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="form-group">
                        <label for="date_of_birth">Data di nascita:</label>
                        <input type="date" wire:model="date_of_birth" class="form-control" id="date_of_birth">
                        @error('date_of_birth') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="place_of_birth">Luogo di nascita:</label>
                        <input type="text" wire:model="place_of_birth" class="form-control" id="place_of_birth">
                        @error('place_of_birth') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Sesso:</label>
                        <select wire:model="gender" class="form-control" id="gender">
                            <option value="">Seleziona sesso</option>
                            <option value="male">Maschio</option>
                            <option value="female">Femmina</option>
                            <option value="other">Altro</option>
                        </select>
                        @error('gender') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="identity_document">Documento di identità:</label>
                        <select wire:model="identity_document" class="form-control" id="identity_document">
                            <option value="">Scegli il tipo di documento</option>
                            <option value="Patente">Patente</option>
                            <option value="Passaporto">Passaporto</option>
                            <option value="Carta d'Identità">Carta d'Identità</option>
                        </select>
                        @error('identity_document') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_number">Numero documento:</label>
                        <input type="text" wire:model="document_number" class="form-control" id="document_number">
                        @error('document_number') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_issuing_place">Luogo rilascio documento:</label>
                        <input type="text" wire:model="document_issuing_place" class="form-control" id="document_issuing_place">
                        @error('document_issuing_place') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Collapse Groups -->
            <p class="form-group mt-3">
                <button class="btn btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#openGroup" aria-expanded="false" aria-controls="openGroup">
                    <i class="fa-regular fa-circle-down"></i> Aggiungi Gruppo
                </button>
            </p>
            <div class="collapse" id="openGroup">
                <div class="card card-body">
                    <!-- Inserisci campi per il primo gruppo -->
                    <h5 class="bg-dark text-white rounded">Gruppo 1</h5>
                    <div class="form-group">
                        <label for="lastname_group_1">Cognome:</label>
                        <input type="text" wire:model="lastname_group_1" class="form-control" id="lastname_group_1">
                        @error('lastname_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="firstname_group_1">Nome:</label>
                        <input type="text" wire:model="firstname_group_1" class="form-control" id="firstname_group_1">
                        @error('firstname_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth_group_1">Data di nascita:</label>
                        <input type="date" wire:model="date_of_birth_group_1" class="form-control" id="date_of_birth_group_1">
                        @error('date_of_birth_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="place_of_birth_group_1">Luogo di nascita:</label>
                        <input type="text" wire:model="place_of_birth_group_1" class="form-control" id="place_of_birth_group_1">
                        @error('place_of_birth_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender_group_1">Sesso:</label>
                        <select wire:model="gender_group_1" class="form-control" id="gender_group_1">
                            <option value="">Seleziona sesso</option>
                            <option value="male">Maschio</option>
                            <option value="female">Femmina</option>
                            <option value="other">Altro</option>
                        </select>
                        @error('gender_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="identity_document_group_1">Documento di identità:</label>
                        <select wire:model="identity_document_group_1" class="form-control" id="identity_document_group_1">
                            <option value="">Scegli il tipo di documento</option>
                            <option value="Patente">Patente</option>
                            <option value="Passaporto">Passaporto</option>
                            <option value="Carta d'Identità">Carta d'Identità</option>
                        </select>
                        @error('identity_document_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_number_group_1">Numero documento:</label>
                        <input type="text" wire:model="document_number_group_1" class="form-control" id="document_number_group_1">
                        @error('document_number_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_issuing_place_group_1">Luogo rilascio documento:</label>
                        <input type="text" wire:model="document_issuing_place_group_1" class="form-control" id="document_issuing_place_group_1">
                        @error('document_issuing_place_group_1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Inserisci campi per il secondo gruppo -->
                    <h5 class="bg-dark text-white mt-3 rounded">Gruppo 2</h5>

                    <div class="form-group">
                        <label for="lastname_group_2">Cognome:</label>
                        <input type="text" wire:model="lastname_group_2" class="form-control" id="lastname_group_2">
                        @error('lastname_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="firstname_group_2">Nome:</label>
                        <input type="text" wire:model="firstname_group_2" class="form-control" id="firstname_group_2">
                        @error('firstname_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth_group_2">Data di nascita:</label>
                        <input type="date" wire:model="date_of_birth_group_2" class="form-control" id="date_of_birth_group_2">
                        @error('date_of_birth_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="place_of_birth_group_2">Luogo di nascita:</label>
                        <input type="text" wire:model="place_of_birth_group_2" class="form-control" id="place_of_birth_group_2">
                        @error('place_of_birth_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender_group_2">Sesso:</label>
                        <select wire:model="gender_group_2" class="form-control" id="gender_group_2">
                            <option value="">Seleziona sesso</option>
                            <option value="male">Maschio</option>
                            <option value="female">Femmina</option>
                            <option value="other">Altro</option>
                        </select>
                        @error('gender_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="identity_document_group_2">Documento di identità:</label>
                        <select wire:model="identity_document_group_2" class="form-control" id="identity_document_group_2">
                            <option value="">Scegli il tipo di documento</option>
                            <option value="Patente">Patente</option>
                            <option value="Passaporto">Passaporto</option>
                            <option value="Carta d'Identità">Carta d'Identità</option>
                        </select>
                        @error('identity_document_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_number_group_2">Numero documento:</label>
                        <input type="text" wire:model="document_number_group_2" class="form-control" id="document_number_group_2">
                        @error('document_number_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_issuing_place_group_2">Luogo rilascio documento:</label>
                        <input type="text" wire:model="document_issuing_place_group_2" class="form-control" id="document_issuing_place_group_2">
                        @error('document_issuing_place_group_2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark my-3 px-4"><i class="fa-regular fa-floppy-disk"></i> Salva</button>
        </form>
    </div>
</div>