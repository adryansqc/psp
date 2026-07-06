<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldTrack($request)) {
            $this->recordVisit($request);
        }

        return $next($request);
    }

    private function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        if (!$request->isMethod('get') || $request->ajax() || $request->wantsJson()) {
            return false;
        }

        if (str_starts_with($path, 'admin')) {
            return false;
        }

        if (str_starts_with($path, 'livewire')) {
            return false;
        }

        $excludedPatterns = [
            'vendor/',
            'assets/',
            'storage/',
            'build/',
            '*.js',
            '*.css',
            '*.png',
            '*.jpg',
            '*.jpeg',
            '*.svg',
            '*.woff*',
            '*.ico',
        ];

        foreach ($excludedPatterns as $pattern) {
            if (fnmatch($pattern, $path) || str_contains($path, trim($pattern, '*'))) {
                return false;
            }
        }

        return true;
    }

    private function recordVisit(Request $request): void
    {
        $sessionId = Session::getId();

        $alreadyVisitedToday = Visitor::where('session_id', $sessionId)
            ->whereDate('visited_at', now()->toDateString())
            ->exists();

        if ($alreadyVisitedToday) {
            return;
        }

        Visitor::create([
            'uuid' => Uuid::uuid7()->toString(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'referer' => $request->header('referer'),
            'session_id' => $sessionId,
            'visited_at' => now(),
        ]);
    }
}
