<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Rules\NoLineBreaks;
use App\Support\ImageUploader;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('dashboard.clients.index', [
            'clients' => Client::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.clients.form', [
            'client' => new Client([
                'is_published' => true,
                'sort_order' => (int) Client::max('sort_order') + 1,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $client = new Client();
        $this->save($request, $client);

        return redirect()->route('dashboard.klien.index')->with('success', 'Logo klien "'.$client->name.'" berhasil ditambahkan.');
    }

    public function edit(Client $klien)
    {
        return view('dashboard.clients.form', ['client' => $klien]);
    }

    public function update(Request $request, Client $klien)
    {
        $this->save($request, $klien);

        return redirect()->route('dashboard.klien.index')->with('success', 'Data klien "'.$klien->name.'" sudah diperbarui.');
    }

    public function destroy(Client $klien)
    {
        $klien->delete();

        return redirect()->route('dashboard.klien.index')->with('success', 'Klien "'.$klien->name.'" sudah dihapus.');
    }

    protected function save(Request $request, Client $client): void
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150', new NoLineBreaks],
            'logo' => [$client->exists ? 'nullable' : 'required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:5120'],
            'website' => ['nullable', 'url:http,https', 'max:255'],
            'project' => ['nullable', 'string', 'max:150', new NoLineBreaks],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
        ], [
            'logo.required' => 'Pilih file logo terlebih dahulu.',
            'website.url' => 'Alamat website harus diawali http:// atau https://.',
        ]);

        $client->fill([
            'name' => $data['name'],
            'website' => $data['website'] ?? null,
            'project' => $data['project'] ?? null,
            'is_published' => $request->boolean('is_published'),
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        if ($request->hasFile('logo')) {
            $old = $client->logo_path;
            $stored = ImageUploader::store($request->file('logo'), 'klien', 600, null);
            $client->logo_path = $stored['path'];
            $client->logo_width = $stored['width'];
            $client->logo_height = $stored['height'];

            if ($old) {
                ImageUploader::delete($old);
            }
        }

        $client->save();
    }
}
