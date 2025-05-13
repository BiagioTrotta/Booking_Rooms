<div class="container py-4">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary bg-gradient text-white p-3">
                    @if($client)
                    <h2 class="h4 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-user-pen me-2"></i> Modifica Cliente
                    </h2>
                    @else
                    <h2 class="h4 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-user-plus me-2"></i> Aggiungi Cliente
                    </h2>
                    @endif
                </div>

                <div class="card-body p-4">
                    <div class="mb-4">
                        <x-session-alerts />
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <button class="btn btn-primary" wire:click="newClient">
                            <i class="fa-solid fa-plus me-1"></i> Nuovo Cliente
                        </button>
                    </div>

                    <form wire:submit.prevent="createClient">
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-header bg-light p-3">
                                <h3 class="h5 mb-0">
                                    <i class="fa-solid fa-address-card me-2 text-primary"></i> Informazioni Principali
                                </h3>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="lastname" class="form-control @error('lastname') is-invalid @enderror" id="lastname" placeholder="Cognome">
                                            <label for="lastname">
                                                <i class="fa-solid fa-user me-1 text-secondary"></i> Cognome
                                            </label>
                                            @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="firstname" class="form-control @error('firstname') is-invalid @enderror" id="firstname" placeholder="Nome">
                                            <label for="firstname">
                                                <i class="fa-solid fa-user me-1 text-secondary"></i> Nome
                                            </label>
                                            @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                                            <label for="email">
                                                <i class="fa-solid fa-envelope me-1 text-secondary"></i> Email
                                            </label>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telefono">
                                            <label for="phone">
                                                <i class="fa-solid fa-phone me-1 text-secondary"></i> Telefono
                                            </label>
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Collapse Details -->
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-header bg-light p-3 d-flex justify-content-between align-items-center">
                                <h3 class="h5 mb-0">
                                    <i class="fa-solid fa-id-card me-2 text-primary"></i> Dati Aggiuntivi
                                </h3>
                                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa-solid fa-chevron-down me-1"></i>
                                    <span class="d-none d-sm-inline">Mostra/Nascondi</span>
                                    <span class="badge bg-secondary ms-1">Opzionale</span>
                                </button>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" wire:model="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Data di nascita">
                                                <label for="date_of_birth">
                                                    <i class="fa-solid fa-calendar-days me-1 text-secondary"></i> Data di nascita
                                                </label>
                                                @error('date_of_birth')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" wire:model="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" placeholder="Luogo di nascita">
                                                <label for="place_of_birth">
                                                    <i class="fa-solid fa-location-dot me-1 text-secondary"></i> Luogo di nascita
                                                </label>
                                                @error('place_of_birth')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <select wire:model="gender" class="form-select @error('gender') is-invalid @enderror" id="gender" aria-label="Sesso">
                                                    <option value="">Seleziona sesso</option>
                                                    <option value="male">Maschio</option>
                                                    <option value="female">Femmina</option>
                                                    <option value="other">Altro</option>
                                                </select>
                                                <label for="gender">
                                                    <i class="fa-solid fa-venus-mars me-1 text-secondary"></i> Sesso
                                                </label>
                                                @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-floating mb-3">
                                                <select wire:model="identity_document" class="form-select @error('identity_document') is-invalid @enderror" id="identity_document" aria-label="Documento di identità">
                                                    <option value="">Scegli il tipo di documento</option>
                                                    <option value="Patente">Patente</option>
                                                    <option value="Passaporto">Passaporto</option>
                                                    <option value="Carta d'Identità">Carta d'Identità</option>
                                                </select>
                                                <label for="identity_document">
                                                    <i class="fa-solid fa-id-card me-1 text-secondary"></i> Documento di identità
                                                </label>
                                                @error('identity_document')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" wire:model="document_number" class="form-control @error('document_number') is-invalid @enderror" id="document_number" placeholder="Numero documento">
                                                <label for="document_number">
                                                    <i class="fa-solid fa-hashtag me-1 text-secondary"></i> Numero documento
                                                </label>
                                                @error('document_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" wire:model="document_issuing_place" class="form-control @error('document_issuing_place') is-invalid @enderror" id="document_issuing_place" placeholder="Luogo rilascio documento">
                                                <label for="document_issuing_place">
                                                    <i class="fa-solid fa-building-columns me-1 text-secondary"></i> Luogo rilascio documento
                                                </label>
                                                @error('document_issuing_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Collapse Groups -->
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-header bg-light p-3 d-flex justify-content-between align-items-center">
                                <h3 class="h5 mb-0">
                                    <i class="fa-solid fa-users me-2 text-primary"></i> Gruppi
                                </h3>
                                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#openGroup" aria-expanded="false" aria-controls="openGroup">
                                    <i class="fa-solid fa-chevron-down me-1"></i>
                                    <span class="d-none d-sm-inline">Mostra/Nascondi</span>
                                    <span class="badge bg-secondary ms-1">Opzionale</span>
                                </button>
                            </div>

                            <div class="collapse" id="openGroup">
                                <div class="card-body p-4">
                                    <!-- Gruppo 1 -->
                                    <div class="card mb-4 border border-primary rounded-3">
                                        <div class="card-header bg-primary bg-opacity-10 p-3">
                                            <h4 class="h6 mb-0 d-flex align-items-center">
                                                <i class="fa-solid fa-user-group me-2 text-primary"></i> Gruppo 1
                                            </h4>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="lastname_group_1" class="form-control @error('lastname_group_1') is-invalid @enderror" id="lastname_group_1" placeholder="Cognome">
                                                        <label for="lastname_group_1">
                                                            <i class="fa-solid fa-user me-1 text-secondary"></i> Cognome
                                                        </label>
                                                        @error('lastname_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="firstname_group_1" class="form-control @error('firstname_group_1') is-invalid @enderror" id="firstname_group_1" placeholder="Nome">
                                                        <label for="firstname_group_1">
                                                            <i class="fa-solid fa-user me-1 text-secondary"></i> Nome
                                                        </label>
                                                        @error('firstname_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" wire:model="date_of_birth_group_1" class="form-control @error('date_of_birth_group_1') is-invalid @enderror" id="date_of_birth_group_1" placeholder="Data di nascita">
                                                        <label for="date_of_birth_group_1">
                                                            <i class="fa-solid fa-calendar-days me-1 text-secondary"></i> Data di nascita
                                                        </label>
                                                        @error('date_of_birth_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="place_of_birth_group_1" class="form-control @error('place_of_birth_group_1') is-invalid @enderror" id="place_of_birth_group_1" placeholder="Luogo di nascita">
                                                        <label for="place_of_birth_group_1">
                                                            <i class="fa-solid fa-location-dot me-1 text-secondary"></i> Luogo di nascita
                                                        </label>
                                                        @error('place_of_birth_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3">
                                                        <select wire:model="gender_group_1" class="form-select @error('gender_group_1') is-invalid @enderror" id="gender_group_1" aria-label="Sesso">
                                                            <option value="">Seleziona sesso</option>
                                                            <option value="male">Maschio</option>
                                                            <option value="female">Femmina</option>
                                                            <option value="other">Altro</option>
                                                        </select>
                                                        <label for="gender_group_1">
                                                            <i class="fa-solid fa-venus-mars me-1 text-secondary"></i> Sesso
                                                        </label>
                                                        @error('gender_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-floating mb-3">
                                                        <select wire:model="identity_document_group_1" class="form-select @error('identity_document_group_1') is-invalid @enderror" id="identity_document_group_1" aria-label="Documento di identità">
                                                            <option value="">Scegli il tipo di documento</option>
                                                            <option value="Patente">Patente</option>
                                                            <option value="Passaporto">Passaporto</option>
                                                            <option value="Carta d'Identità">Carta d'Identità</option>
                                                        </select>
                                                        <label for="identity_document_group_1">
                                                            <i class="fa-solid fa-id-card me-1 text-secondary"></i> Documento di identità
                                                        </label>
                                                        @error('identity_document_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="document_number_group_1" class="form-control @error('document_number_group_1') is-invalid @enderror" id="document_number_group_1" placeholder="Numero documento">
                                                        <label for="document_number_group_1">
                                                            <i class="fa-solid fa-hashtag me-1 text-secondary"></i> Numero documento
                                                        </label>
                                                        @error('document_number_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="document_issuing_place_group_1" class="form-control @error('document_issuing_place_group_1') is-invalid @enderror" id="document_issuing_place_group_1" placeholder="Luogo rilascio documento">
                                                        <label for="document_issuing_place_group_1">
                                                            <i class="fa-solid fa-building-columns me-1 text-secondary"></i> Luogo rilascio documento
                                                        </label>
                                                        @error('document_issuing_place_group_1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gruppo 2 -->
                                    <div class="card border border-primary rounded-3">
                                        <div class="card-header bg-primary bg-opacity-10 p-3">
                                            <h4 class="h6 mb-0 d-flex align-items-center">
                                                <i class="fa-solid fa-user-group me-2 text-primary"></i> Gruppo 2
                                            </h4>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="lastname_group_2" class="form-control @error('lastname_group_2') is-invalid @enderror" id="lastname_group_2" placeholder="Cognome">
                                                        <label for="lastname_group_2">
                                                            <i class="fa-solid fa-user me-1 text-secondary"></i> Cognome
                                                        </label>
                                                        @error('lastname_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="firstname_group_2" class="form-control @error('firstname_group_2') is-invalid @enderror" id="firstname_group_2" placeholder="Nome">
                                                        <label for="firstname_group_2">
                                                            <i class="fa-solid fa-user me-1 text-secondary"></i> Nome
                                                        </label>
                                                        @error('firstname_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" wire:model="date_of_birth_group_2" class="form-control @error('date_of_birth_group_2') is-invalid @enderror" id="date_of_birth_group_2" placeholder="Data di nascita">
                                                        <label for="date_of_birth_group_2">
                                                            <i class="fa-solid fa-calendar-days me-1 text-secondary"></i> Data di nascita
                                                        </label>
                                                        @error('date_of_birth_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="place_of_birth_group_2" class="form-control @error('place_of_birth_group_2') is-invalid @enderror" id="place_of_birth_group_2" placeholder="Luogo di nascita">
                                                        <label for="place_of_birth_group_2">
                                                            <i class="fa-solid fa-location-dot me-1 text-secondary"></i> Luogo di nascita
                                                        </label>
                                                        @error('place_of_birth_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3">
                                                        <select wire:model="gender_group_2" class="form-select @error('gender_group_2') is-invalid @enderror" id="gender_group_2" aria-label="Sesso">
                                                            <option value="">Seleziona sesso</option>
                                                            <option value="male">Maschio</option>
                                                            <option value="female">Femmina</option>
                                                            <option value="other">Altro</option>
                                                        </select>
                                                        <label for="gender_group_2">
                                                            <i class="fa-solid fa-venus-mars me-1 text-secondary"></i> Sesso
                                                        </label>
                                                        @error('gender_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-floating mb-3">
                                                        <select wire:model="identity_document_group_2" class="form-select @error('identity_document_group_2') is-invalid @enderror" id="identity_document_group_2" aria-label="Documento di identità">
                                                            <option value="">Scegli il tipo di documento</option>
                                                            <option value="Patente">Patente</option>
                                                            <option value="Passaporto">Passaporto</option>
                                                            <option value="Carta d'Identità">Carta d'Identità</option>
                                                        </select>
                                                        <label for="identity_document_group_2">
                                                            <i class="fa-solid fa-id-card me-1 text-secondary"></i> Documento di identità
                                                        </label>
                                                        @error('identity_document_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="document_number_group_2" class="form-control @error('document_number_group_2') is-invalid @enderror" id="document_number_group_2" placeholder="Numero documento">
                                                        <label for="document_number_group_2">
                                                            <i class="fa-solid fa-hashtag me-1 text-secondary"></i> Numero documento
                                                        </label>
                                                        @error('document_number_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" wire:model="document_issuing_place_group_2" class="form-control @error('document_issuing_place_group_2') is-invalid @enderror" id="document_issuing_place_group_2" placeholder="Luogo rilascio documento">
                                                        <label for="document_issuing_place_group_2">
                                                            <i class="fa-solid fa-building-columns me-1 text-secondary"></i> Luogo rilascio documento
                                                        </label>
                                                        @error('document_issuing_place_group_2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fa-solid fa-floppy-disk me-2"></i> Salva
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>