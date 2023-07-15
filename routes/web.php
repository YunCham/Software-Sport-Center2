<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;

use App\Http\Livewire\Notifications;

//Para Bitacora
use App\Http\Livewire\Bitacora;

//Para el personal
use App\Http\Livewire\Personal\EditarPersonalComponent;
use App\Http\Livewire\Personal\PersonalComponent;
use App\Http\Livewire\Personal\RegistrarPersonalComponent;
//aparte
use App\Http\Livewire\Profile;
use App\Http\Livewire\Proveedor\EditarProveedorComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Proveedor\RegistroProveedorComponent;
use App\Http\Livewire\RTL;

use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Usuario\EditarUsuarioComponent;
use App\Http\Livewire\Usuario\RegistrarUsuarioComponent;
use App\Http\Livewire\Usuario\UsuarioComponent;
use App\Http\Livewire\VirtualReality;
//para los tipos de servicios de la membresia
use App\Http\Livewire\TpServicio\TiposComponent;
use App\Http\Livewire\TpServicio\RegistrarComponent;
use App\Http\Livewire\TpServicio\EditarComponent;

//Para los servicios
use App\Http\Livewire\Servicio\ServicioComponent;
use App\Http\Livewire\Servicio\EditarServicioComponent;
use App\Http\Livewire\Servicio\RegistrarServicioComponent;

//Para las membresias
use App\Http\Livewire\Membresia\MembresiaComponent;
use App\Http\Livewire\Membresia\RegistrarMembresiaComponent;
use App\Http\Livewire\Membresia\EditarMembresiaComponent;

//Para las marcas
use App\Http\Livewire\Marca\MarcaComponent;
use App\Http\Livewire\Marca\RegistrarMarcaComponent;
use App\Http\Livewire\Marca\EditarMarcaComponent;

//Para las categorias
use App\Http\Livewire\Categoria\CategoriaComponent;
use App\Http\Livewire\Categoria\RegistrarCategoriaComponent;
use App\Http\Livewire\Categoria\EditarCategoriaComponent;

//Para los productos
use App\Http\Livewire\Producto\ProductoComponent;
use App\Http\Livewire\Producto\RegistrarProductoComponent;
use App\Http\Livewire\Producto\EditarProductoComponent;

//Para las nota de compras
use App\Http\Livewire\NotaCompra\NotaCompraComponent;
use App\Http\Livewire\NotaCompra\RegistrarNotaCompraComponent;
use App\Http\Livewire\NotaCompra\EditarNotaCompraComponent;
use App\Http\Livewire\Transaccion\EditarTransaccionComponet;

use App\Http\Controllers\NotaCompraController;

//para las transacciones
use App\Http\Livewire\Transaccion\RegistrarTransaccionComponet;
use App\Http\Livewire\Transaccion\TransaccionComponent;

//Para los Permisos
use App\Http\Livewire\Permiso\CrearPermisoComponent;
use App\Http\Livewire\Permiso\EditarPermisoComponent;
use App\Http\Livewire\Permiso\PermisoComponent;
//Para los Roles
use App\Http\Livewire\Role\EditarRoleComponent;
use App\Http\Livewire\Role\RegistrarRoleComponent;
use App\Http\Livewire\Role\RoleComponent;
//Para los clientes
use App\Http\Livewire\Cliente\ClienteComponent;
use App\Http\Livewire\Cliente\EditarClienteComponent;
use App\Http\Livewire\Cliente\RegistrarClienteComponent;
//Para los estasd de la reserva
use App\Http\Livewire\EstadoReserava\EstadoReservaComponent;
use App\Http\Livewire\EstadoReserava\RegistrarEstadoReservaComponent;
use App\Http\Livewire\EstadoReserava\EditarEstadoReservaComponent;
//Para el area de reserava
use App\Http\Livewire\Area\AreaComponent;
use App\Http\Livewire\Area\EditarAreaComponent;
use App\Http\Livewire\Area\RegistrarAreaComponent;

//para la reserva
use App\Http\Livewire\Reserava\EditarReservaComponent;
use App\Http\Livewire\Reserava\RegistrarReservaComponent;
use App\Http\Livewire\Reserava\ReservaComponent;
//aparte
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('billing', Billing::class)->name('billing');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('tables', Tables::class)->name('tables');
    Route::get('notifications', Notifications::class)->name("notifications");
    Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('rtl', RTL::class)->name('rtl');
    //mis rutas
    Route::get('/personal', PersonalComponent::class)->middleware('can:perosnal.index')->name('perosnal.index');
    Route::get('/personal/registro', RegistrarPersonalComponent::class)->middleware('can:personal-registro')->name('personal-registro');
    Route::get('/personal/editar/{personal_id}', EditarPersonalComponent::class)->middleware('can:personal-editar')->name('personal-editar');

    //Tipos de servicios para la membresia
    Route::get('/tservicio', TiposComponent::class)->middleware('can:tservicio.index')->name('tservicio.index');
    Route::get('/tservicio/registrar', RegistrarComponent::class)->middleware('can:tservicio.registrar')->name('tservicio.registrar');
    Route::get('/tservicio/editar/{tservicio_id}', EditarComponent::class)->middleware('can:tservicio.editar')->name('tservicio.editar');

    //Servicios para la membresia
    Route::get('/servicio', ServicioComponent::class)->middleware('can:servicio.index')->name('servicio.index');
    Route::get('/servicio/registrar', RegistrarServicioComponent::class)->middleware('can:servicio.registrar')->name('servicio.registrar');
    Route::get('/servicio/editar/{servicio_id}', EditarServicioComponent::class)->middleware('can:servicio.editar')->name('servicio.editar');

    //Membresias
    Route::get('/membresias', MembresiaComponent::class)->middleware('can:membresia')->name('membresia');
    Route::get('/membresia/registrar', RegistrarMembresiaComponent::class)->middleware('can:membresia-registrar')->name('membresia-registrar');
    Route::get('/membresia/editar/{membresia_id}', EditarMembresiaComponent::class)->middleware('can:membresia-editar')->name('membresia-editar');

    //! routers usuario con errores CORREGIR!!!!
    Route::get('/usuario', UsuarioComponent::class)->middleware('can:usuario')->name('usuario');
    Route::get('/usuario/registrar', RegistrarUsuarioComponent::class)->middleware('can:usuario-registro')->name('usuario-registro');
    Route::get('/usuario/editar/{user_id}', EditarUsuarioComponent::class)->middleware('can:usuario-editar')->name('usuario-editar');

    // proovedor
    Route::get('/proveedor', ProveedorComponent::class)->middleware('can:proveedor.index')->name('proveedor.index');
    Route::get('/proveedor/registro', RegistroProveedorComponent::class)->middleware('can:proveedor-registro')->name('proveedor-registro');
    Route::get('/proveedor/editar/{proveedor_id}', EditarProveedorComponent::class)->middleware('can:proveedor-editar')->name('proveedor-editar');

    //Para las marcas
    Route::get('/marca', MarcaComponent::class)->middleware('can:marca.index')->name('marca.index');
    Route::get('/marca/registrar', RegistrarMarcaComponent::class)->middleware('can:marca.registrar')->name('marca.registrar');
    Route::get('/marca/editar/{marca_id}', EditarMarcaComponent::class)->middleware('can:marca.editar')->name('marca.editar');

    //Para las categorias
    Route::get('/categoria', CategoriaComponent::class)->middleware('can:categoria.index')->name('categoria.index');
    Route::get('/categoria/registrar', RegistrarCategoriaComponent::class)->middleware('can:categoria.registrar')->name('categoria.registrar');
    Route::get('/categoria/editar/{categoria_id}', EditarCategoriaComponent::class)->middleware('can:categoria.editar')->name('categoria.editar');

    //Para los productos
    Route::get('/producto', ProductoComponent::class)->middleware('can:producto.index')->name('producto.index');
    Route::get('/producto/registrar', RegistrarProductoComponent::class)->middleware('can:producto.registrar')->name('producto.registrar');
    Route::get('/producto/editar/{producto_id}', EditarProductoComponent::class)->middleware('can:producto.editar')->name('producto.editar');

    //Para las nota de compras
    Route::get('/nota_compra', NotaCompraComponent::class)->middleware('can:nota_compra.index')->name('nota_compra.index');
    Route::get('/nota_compra/registrar', RegistrarNotaCompraComponent::class)->middleware('can:nota_compra.registrar')->name('nota_compra.registrar');
    Route::get('/nota_compra/editar/{compra_id}', EditarNotaCompraComponent::class)->middleware('can:nota_compra.editar')->name('nota_compra.editar');    

   // Route::get('/nota_compra/{nota_compra_id}/pdf', 'NotaCompraController@generarPDF')->name('nota_compra.pdf');
    Route::get('nota_compra/{nota_compra_id}/pdf', [NotaCompraController::class, 'generarPDF'])->middleware('can:nota_compra.pdf')->name('nota_compra.pdf');

    // Bitacora
    Route::get('/bitacora', Bitacora::class)->middleware('can:bitacora.index')->name('bitacora.index');

    //Para los Roles
    Route::get('/role', RoleComponent::class)->middleware('can:rol.index')->name('rol.index');
    Route::get('/role/registrar', RegistrarRoleComponent::class)->middleware('can:rol.registrar')->name('rol.registrar');
    Route::get('/role/editar/{rol_id}', EditarRoleComponent::class)->middleware('can:rol.editar')->name('rol.editar');

    //Para los Permiso
    Route::get('/permiso', PermisoComponent::class)->middleware('can:permiso.index')->name('permiso.index');
    Route::get('/permiso/registrar', CrearPermisoComponent::class)->middleware('can:permiso.index')->name('permiso.registrar');
    Route::get('/permiso/editar/{permiso_id}', EditarPermisoComponent::class)->middleware('can:permiso.index')->name('permiso.editar');

    //! Para las Transacciones
    Route::get('/transaccion', TransaccionComponent::class)->middleware('can:transaccion')->name('transaccion');
    Route::get('/transaccion/registrar', RegistrarTransaccionComponet::class)->middleware('can:transaccion.registrar')->name('transaccion.registrar');
    Route::get('/transaccion/editar/{transaccion_id}', EditarTransaccionComponet::class)->middleware('can:Transaccion.editar')->name('Transaccion.editar');

    // TODO: Ruata de tabla cliente
    Route::get('/cliente',ClienteComponent::class)->middleware('can:cliente.index')->name('cliente.index');
    Route::get('/cliente/registrar', RegistrarClienteComponent::class)->middleware('can:cliente.registrar')->name('cliente.registrar');
    Route::get('/cliente/editar/{cliente_id}', EditarClienteComponent::class)->middleware('can:cliente.editar')->name('cliente.editar');

    // TODO: Ruata de tabla Estaod de  Reserava
    Route::get('/estado',EstadoReservaComponent::class)->middleware('can:estado.index')->name('estado.index');
    Route::get('/estado/registrar', RegistrarEstadoReservaComponent::class)->middleware('can:estado.registrar')->name('estado.registrar');
    Route::get('/estado/editar/{estado_id}', EditarEstadoReservaComponent::class)->middleware('can:estado.editar')->name('estado.editar');

    // TODO: Ruata de tabla Area de reserava
    Route::get('/area',AreaComponent::class)->middleware('can:area.index')->name('area.index');
    Route::get('/area/registrar', RegistrarAreaComponent::class)->middleware('can:area.registrar')->name('area.registrar');
    Route::get('/area/editar/{area_id}', EditarAreaComponent::class)->middleware('can:area.editar')->name('area.editar');

    // TODO: Ruata de tabla Reserava
    Route::get('/reserva',ReservaComponent::class)->middleware('can:reserva.index')->name('reserva.index');
    Route::get('/reserva/registrar', RegistrarReservaComponent::class)->middleware('can:reserva.registrar')->name('reserva.registrar');
    Route::get('/reserva/editar/{reserva_id}', EditarReservaComponent::class)->middleware('can:reserva.editar')->name('reserva.editar');

});

