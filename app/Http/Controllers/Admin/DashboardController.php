<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Permission, Plan, Product, Profile, Role, Table, User, Occurrences, TypeOccurrence, Issuing};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $tenant = auth()->user()->tenant;

        $totalUsers =  User::where('tenant_id', $tenant->id)->count();
        //$totalTables = Table::where('tenant_id', $tenant->id)->count();
        $totalOcurrencies = Occurrences::count();
        $totalCategory = Category::count();

        $totalTypeOccurrence = TypeOccurrence::count();
        $totalIssuings = Role::count();
        $totalPlans = Plan::count();
        $totalPermission = Permission::count();
        $totalRoles = Role::count();

        return view(
            'admin.pages.home.index',
            compact(
                'totalUsers',
                'totalOcurrencies',
                'totalCategory',
                'totalTypeOccurrence',
                'totalIssuings',
                'totalRoles',
                'totalPlans',
                'totalPermission'
            )
        );
    }
}
