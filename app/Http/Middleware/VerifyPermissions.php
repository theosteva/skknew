<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class VerifyPermissions
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        
        if (!$user || !$user->hasAnyRole(Role::all())) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        if ($user->hasRole('super-admin')) {
            return $next($request);
        }

        $routeName = $request->route()->getName();
        
        if (in_array($routeName, ['filament.pages.dashboard', 'filament.pages.profile'])) {
            return $next($request);
        }

        $permission = $this->getRequiredPermission($routeName);
        
        if (!$user->can($permission)) {
            abort(403, 'Anda tidak memiliki permission yang diperlukan.');
        }

        return $next($request);
    }

    private function getRequiredPermission(string $routeName): string
    {
        $action = Str::contains($routeName, '.create') ? 'create-' :
                 (Str::contains($routeName, '.edit') ? 'edit-' :
                 (Str::contains($routeName, '.delete') ? 'delete-' : 'view-'));

        $resource = Str::between($routeName, 'filament.resources.', '.');
        
        $resource = match ($resource) {
            'contact-form' => 'contacts',
            'faq' => 'faqs',
            default => $resource,
        };
        
        return $action . $resource;
    }
} 