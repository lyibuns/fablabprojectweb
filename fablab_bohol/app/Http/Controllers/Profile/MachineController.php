<?php



namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function showMachineDetail(Request $request)
    {
        $machineId = $request->query('machineId');

        return view('profile.machine-detail', [
            'machineId' => $machineId
        ]);
    }
}

