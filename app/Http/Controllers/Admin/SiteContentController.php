<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function edit()
    {
        $content = SiteSetting::publicContent();

        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request)
    {
        $rules = collect(SiteSetting::defaults())
            ->mapWithKeys(fn ($value, $key) => [$key => ['nullable', 'string', 'max:5000']])
            ->toArray();

        $data = $request->validate($rules);

        SiteSetting::updateContent($data);

        return redirect()->route('admin.content.edit')->with('success', 'Konten website berhasil diperbarui.');
    }
}
