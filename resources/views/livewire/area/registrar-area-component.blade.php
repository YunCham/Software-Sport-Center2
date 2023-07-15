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
                            <h6 class="mb-3">Registrar Area</h6>
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
                    <form wire:submit.prevent='storeArea'>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre</label>
                                <input wire:model="nombre_Area" type="text" class="form-control border border-2 p-2">
                                @error('nombre_Area')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Tipo de Area</label>
                                <input wire:model="tipo_Area" name="tipo_Area" type="text"
                                    class="form-control border border-2 p-2">
                                @error('tipo_Area')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Capacidad</label>
                                <input wire:model="capacidad" type="number"
                                    class="form-control border border-2 p-2">
                                @error('capacidad')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos de Area</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Estado del area</label>
                                <select name="estado" wire:model="estado" class="form-control border border-2 p-2">
                                    <option value="">Seleccionar Estado</option>
                                    <option value="mantenimiento">mantenimiento</option>
                                    <option value="ocupado">Ocupado</option>
                                    <option value="disponible">Disponible</option>
                                    <option value="fuera de servicio">fuera de servicio</option>
                                    <option value="reservado">Reservado</option>
                                </select>
                                @error('estado')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">

                                <label class="form-label">Hora de Apertura</label>
                                <input wire:model="horario_apertura" type="time" class="form-control border border-2 p-2">
                                @error('horario_apertura')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Hora de Cierre</label>
                                <input wire:model="horario_cierre" type="time" class="form-control border border-2 p-2">
                                @error('horario_cierre')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Descripcion</label>
                                <input wire:model="descripcion" type="text" class="form-control border border-2 p-2">
                                @error('descripcion')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Imagen del Area</label>
                                <div class="input-group">
                                    <input type="file" wire:model="imagen" class="form-control border border-2 p-2" placeholder="Ingrese una imagen">
                                    @if ($imagen)
                                        <img src="{{$imagen->temporaryUrl()}}" wideth="120" alt="">
                                    @endif
                                </div>
                                @error('imagen')
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
