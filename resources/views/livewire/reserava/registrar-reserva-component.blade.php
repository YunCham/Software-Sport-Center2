<div>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Datos de Estado</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (Session::has('status'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <form wire:submit.prevent='storeReserva'>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Reserva Area</label>
                                <select class="form-control border border-2 p-2" name="area_id" id=""
                                    wire:model="area_id">
                                    <option value="">Escoja el area</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre_Area }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre del Cliente</label>
                                <select class="form-control border border-2 p-2" name="cliente_id" id=""
                                    wire:model="cliente_id">
                                    <option value="">Escoja el area</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>


                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos de la Reserva</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Fecha de reserva</label>
                                <input wire:model="fecha" type="date" class="form-control border border-2 p-2">
                                @error('fecha')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hora de inicio</label>
                                <input wire:model="hora_inicio" type="time" class="form-control border border-2 p-2">
                                @error('hora_inicio')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hora del Final</label>
                                <input wire:model="hora_fin" type="time" class="form-control border border-2 p-2">
                                @error('hora_fin')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Estado</label>
                                <select class="form-control border border-2 p-2" name="estado_reserva_id" id=""
                                    wire:model="estado_reserva_id">
                                    <option value="">escoja estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
                                        </option>
                                    @endforeach
                                </select>
                                @error('estado_reserva_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Comenario</label>
                                <input wire:model="comentario" type="text" class="form-control border border-2 p-2">
                                @error('comentario')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                        </div>
                        {{-- @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif --}}
                        <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                        <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
