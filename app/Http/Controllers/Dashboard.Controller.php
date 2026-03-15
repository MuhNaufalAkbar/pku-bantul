<?php

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function perawatDashboard()
    {
        // Menampilkan dashboard perawat
        return view('dashboard_perawat');  // Pastikan Anda sudah memiliki view dashboard perawat
    }

    public function pasienDashboard()
    {
        // Menampilkan dashboard pasien
        return view('dashboard');  // Pastikan Anda sudah memiliki view dashboard pasien
    }
}
