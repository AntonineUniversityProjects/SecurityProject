<?php

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegisterUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegisterUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Validation rules
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            // Create user
        ]);

        // Additional logic based on user role
        if ($data['role'] === 'doctor') {
            // Custom logic for doctors
            // For example, redirect to doctor-specific route
            return redirect()->route('admin.doctor.create');
        }

        // Default behavior
        return $user;
    }

    protected function registered(\Illuminate\Http\Request $request, $user)
    {
        // Handle post-registration tasks, if needed
    }
}
