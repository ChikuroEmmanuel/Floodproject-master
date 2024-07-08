<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemConfig;

class SystemConfigController extends Controller
{
    public function index()
    {
        $config = SystemConfig::first();

        return view('admin.system-config', compact('config'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'api_key' => 'required',
            'database_host' => 'required',
            'database_username' => 'required',
            'database_password' => 'required',
            'database_name' => 'required',
        ]);

        $config = SystemConfig::firstOrCreate([], $request->all());

        return redirect()->route('admin.system-config')->with('success', 'System configuration saved successfully!');
    }

    public function edit(SystemConfig $config)
    {
        return view('admin.system-config', compact('config'));
    }

    public function update(Request $request, SystemConfig $config)
    {
        $request->validate([
            'api_key' => 'required',
            'database_host' => 'required',
            'database_username' => 'required',
            'database_password' => 'required',
            'database_name' => 'required',
        ]);

        $config->update($request->all());

        return redirect()->route('system-config.index')->with('success', 'System configuration updated successfully!');
    }
    
}