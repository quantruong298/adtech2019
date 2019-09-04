<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDomainRequest;
use App\Models\Domain;

class SspController extends Controller
{

    public function index()
    {
        $getListDomain = $this->getListDomain();
        return view('Component.SSP.ssp', compact('getListDomain'));
    }

    public function getListDomain()
    {
        $getListDomain = Domain::paginate(10);
        return $getListDomain;
    }

    public function store(AddDomainRequest $request)
    {
        $url = parse_url($request->domain);
        $parseDomain = ($url['host']);
        $domain = new Domain();
        $domain->domain = $parseDomain;
        $domain->save();
        return redirect()->route('SSP');
    }

}
