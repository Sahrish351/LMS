<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        
        $data = [
            'totalStudents'         => 12847,
            'totalTeachers'         => 342,
            'activeCourses'         => 186,
            'activeBatches'         => 48,
            'monthlyRevenue'        => '48.2L',
            'pendingAmount'         => '3.84L',
            'certificatesIssued'    => 2341,
            'openTickets'           => 23,
            'pendingPaymentsCount'  => 3,
            'pendingApprovalsCount' => 3,
            
        ];

        return view('admin.dashboard.index', $data);
    }
}
