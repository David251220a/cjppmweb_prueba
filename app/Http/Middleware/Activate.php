<?php

namespace App\Http\Middleware;

use App\Models\Affiliate;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Activate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $affiliate = Affiliate::where('document_number', Auth::user()->username)->first();
        if ($affiliate) {
            if (empty(Auth::user()->doc_f)) {
                return redirect()->route('validate', ['step' => 1])->send();
            } else if (empty(Auth::user()->doc_p)) {
                return redirect()->route('validate', ['step' => 2])->send();
            } else if (empty(Auth::user()->doc_v)) {
                return redirect()->route('validate', ['step' => 3])->send();
            }
        }

        return $next($request);
    }
}
