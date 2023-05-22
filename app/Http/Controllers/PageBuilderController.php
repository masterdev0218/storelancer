<?php

namespace App\Http\Controllers;

use App\Models\PageOption;
use Illuminate\Http\Request;

class PageBuilderController extends Controller
{
    public function get(PageOption $page) {
        return view('page-builder', [
            'name'                  => $page->name,
            'slug'                  => $page->slug,
            'store_id'              => $page->store_id,
            'enable_page_header'    => $page->enable_page_header,
            'enable_page_footer'    => $page->enable_page_footer,
            'contents'              => $page->contents,
            'page_id'               => $page->id
        ]);
    }

    public function save(Request $request, $pageId) {
        $request->validate([
            'name'                  => 'required|string',
            'slug'                  => 'required|string',
            'enable_page_header'    => 'required|string',
            'enable_page_footer'    => 'required|string',
            'html'                  => 'required|string',
            'css'                   => 'required|string',
        ]);

        $html = $request->html;
        $css = $request->css;
        $user = $request->user();

        $request->merge([
            'html'  => base64_decode($html),
            'css'   => $css,
        ]);

        PageOption::findOrFail($pageId)->update($request->all());

        return redirect()->back()->with('success', __('Page Successfully added!'));
    }

    public function loadPage(PageOption $page) {
        return view('custom-page', [
            'page' => $page
        ]);
    }
}
