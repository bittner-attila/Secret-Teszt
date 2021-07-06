<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Support\Str;
use App\Http\Resources\SecretResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SecretStoreRequest;
use Symfony\Component\HttpFoundation\Response;

class SecretController extends Controller
{
	public function store(SecretStoreRequest $request) 
	{		
		
		$newSecret = Secret::create([
			'hash' 		 => Hash::make(Str::uuid() . $request->secret),
			'secretText' => $request->secret,
			'expiresAt'	 => $request->expireAfter != 0 ? date('Y-m-d h:i:sa', strtotime('now + ' . $request->expireAfter . ' min')) : null,
			'remainingViews' => $request->expireAfterViews,
		]);

		return response(new SecretResource($newSecret), Response::HTTP_CREATED);
	}

    public function show(Request $request, $hash) 
    {
    	$secret = Secret::findActiveSecretByHash($hash);

    	return new SecretResource($newSecret);
    }
}
