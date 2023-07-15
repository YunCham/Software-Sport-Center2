
<div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Cliente</h6>
                    </div>
                    {{-- boton añadir --}}
                    <div class=" me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('cliente.registrar') }}"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Registrar</a>
                    </div>
                    @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cliente</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        fecha de nacimento</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Direccion</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ciudad</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipo de Cliente</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                {{-- <div>
                                                    <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div> --}}
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cliente->nombre }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cliente->fecha_nacimiento }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cliente->telefono }}</h6>
                                                    <p class="text-xs text-secondary mb-0"> {{ $cliente->direccion }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cliente->ciudad }}</h6>
                                                    <p class="text-xs text-secondary mb-0"> {{ $cliente->estado }}
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cliente->tipo_cliente }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">cel. {{ $cliente->estado }} --}}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <a href="{{ route('cliente.editar', ['cliente_id' => $cliente->id]) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Editar
                                            </a>
                                        </td>
                                        <td class="align-middle">

                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Eliminar"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification-{{ $cliente->id }}">
                                                Eliminar
                                                <div class="modal fade" id="modal-notification-{{ $cliente->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title font-weight-normal"
                                                                    id="modal-title-notification">Se requiere tu
                                                                    atención!!!</h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="material-icons h1 text-secondary">
                                                                        Eliminar cliente
                                                                    </i>
                                                                    <h4 class="text-gradient text-danger mt-4">Esta
                                                                        seguro!</h4>
                                                                    <p>Paso a Paso</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm"wire:click="deleteCliente({{ $cliente->id }})">Eliminar</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-sm">Cancelar</button>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                              
                              <!-- Enlace de página anterior -->
                              <li class="page-item {{ $clientes->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $clientes->previousPageUrl() }}" tabindex="-1">
                                  <span class="material-icons">
                                    keyboard_arrow_left
                                  </span>
                                  <span class="sr-only">Previous</span>
                                </a>
                              </li>
                              
                              <!-- Enlaces de páginas -->
                              @php
                                $currentPage = $clientes->currentPage();
                                $lastPage = $clientes->lastPage();
                                $maxVisibleLinks = 3; // Muestra solo 3 índices, puedes cambiar este valor según tus necesidades
                                $startLink = max($currentPage - 1, 1);
                                $endLink = min($startLink + $maxVisibleLinks - 1, $lastPage);
                              @endphp
                              
                              @if ($startLink > 1)
                                <!-- Mostrar puntos suspensivos si hay páginas anteriores no visibles -->
                                <li class="page-item disabled">
                                  <span class="page-link">...</span>
                                </li>
                              @endif
                              
                              @for ($i = $startLink; $i <= $endLink; $i++)
                                <li class="page-item {{ $currentPage === $i ? 'active' : '' }}">
                                  <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                                </li>
                              @endfor
                              
                              @if ($endLink < $lastPage)
                                <!-- Mostrar puntos suspensivos si hay páginas posteriores no visibles -->
                                <li class="page-item disabled">
                                  <span class="page-link">...</span>
                                </li>
                              @endif
                              
                              <!-- Enlace de página siguiente -->
                              <li class="page-item {{ $clientes->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $clientes->nextPageUrl() }}">
                                  <span class="material-icons">
                                    keyboard_arrow_right
                                  </span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </li>
                              
                            </ul>
                          </nav>

                        {{-- {{ $clientes->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>