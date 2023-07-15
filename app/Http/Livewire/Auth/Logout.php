<?php

namespace App\Http\Livewire\Auth;

use App\Models\Bitacora;
use Livewire\Component;

class Logout extends Component
{

    public function destroy()
    {
        $user = auth()->user();
        Bitacora::Bitacora('L', 'Usuario', $user->id);
        auth()->logout();
        return redirect('/sign-in');
    }

    
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
