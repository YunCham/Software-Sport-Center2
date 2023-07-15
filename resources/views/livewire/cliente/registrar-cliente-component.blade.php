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
                            <h6 class="mb-3">Datos de Cliente</h6>
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
                    <form wire:submit.prevent='storeCliente'>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre</label>
                                <input wire:model="nombre" type="text" class="form-control border border-2 p-2">
                                @error('nombre')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Apellidos Paterno</label>
                                <input wire:model="apellido_paterno" name="apellido_paterno" type="text"
                                    class="form-control border border-2 p-2">
                                @error('apellido_paterno')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Apellido Materno</label>
                                <input wire:model="apellido_materno" type="text"
                                    class="form-control border border-2 p-2">
                                @error('apellido_materno')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Fecha de Nacimiento</label>
                                <input wire:model="fecha_nacimiento" type="date"
                                    class="form-control border border-2 p-2">
                                @error('fecha_nacimiento')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Genero</label>
                                <select name="genero" wire:model="genero" class="form-control border border-2 p-2">
                                    <option value="">Seleccionar género</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                                @error('genero')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos de contacto</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Telefono</label>
                                <input wire:model="telefono" type="number" class="form-control border border-2 p-2">
                                @error('telefono')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Direccion</label>
                                <input wire:model="direccion" type="text" class="form-control border border-2 p-2">
                                @error('direccion')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Ciuidad de residencia</label>
                                <input wire:model="ciudad" type="text" class="form-control border border-2 p-2">
                                @error('ciudad')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Provincia</label>
                                <input wire:model="estado" type="text" class="form-control border border-2 p-2">
                                @error('estado')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Tipo de Membresia</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Membresia</label>
                                <select class="form-control border border-2 p-2" name="transaccion_id" id=""
                                    wire:model="transaccion_id">
                                    <option value="">Transaccion</option>
                                    @foreach ($transaccions as $transaccion)
                                        <option value="{{ $transaccion->id }}">{{ $transaccion->tipo_transaccion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('transaccion_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Cliente</label>
                                <select name="tipo_cliente" wire:model="tipo_cliente"
                                    class="form-control border border-2 p-2">
                                    <option value="">Seleccionar tipo de cliente</option>
                                    <option value="persona">Persona</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                                @error('tipo_cliente')
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
