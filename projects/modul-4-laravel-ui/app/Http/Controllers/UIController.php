<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UIController extends Controller
{
    public function home(Request $request)
    {
        $theme = session('theme', 'light');
        $alertMessage = 'Selamat datang di Laravel UI Integrated Demo!';
        $features = [
            'Partial Views',
            'Blade Components', 
            'Theme Switching',
            'Bootstrap 5',
            'Responsive Design'
        ];
        return view('home', compact('theme', 'alertMessage', 'features'));
    }
    public function about(Request $request)
    {
        $theme = session('theme', 'light');
        $alertMessage = 'Halaman ini menggunakan Partial Views!';
        $team = [
            ['name' => 'Hayzar Muhaiyar', 'role' => 'Full Stack Developer'],
            ['name' => 'Hamizan Putra Zulia', 'role' => 'Game Developer'],
            ['name' => 'Hafidz Maulana', 'role' => 'Backend Developer'],
            ['name' => 'Firdhila Ananda Syahputri', 'role' => 'UI/UX Designer'],
            ['name' => 'Maisha Zahrani', 'role' => 'Product Manager'],
            ['name' => 'Bunga Alfa Zahra', 'role' => 'QA Engineer'],
            ['name' => 'Deva', 'role' => 'DevOps Engineer'],
            ['name' => 'Faqriadi Andika', 'role' => 'Project Lead']
        ];
        return view('about', compact('theme', 'alertMessage', 'team'));
    }
    public function contact(Request $request)
    {
        $theme = session('theme', 'light');
        $departments = [
            'Technical Support',
            'Sales',
            'Billing',
            'General Inquiry'
        ];
        return view('contact', compact('theme', 'departments'));
    }
    public function profile(Request $request)
    {
        $theme = session('theme', 'light');
        $user = [
            'name' => 'Ejarr',
            'email' => 'Ejarr@example.com',
            'join_date' => '2024-01-15',
            'preferences' => ['Email Notifications', 'Dark Mode', 'Newsletter']
        ];
        return view('profile', compact('theme', 'user'));
    }
   public function switchTheme($theme, Request $request)
{
    if (in_array($theme, ['light', 'dark'])) {
        session(['theme' => $theme]);
    }
    return back();
}
}
