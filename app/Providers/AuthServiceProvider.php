<?php

namespace App\Providers;

use App\Event;
use App\Enums\EventStatusType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerUserPolicies();
        $this->registerEventPolicies();
    }

    public function registerUserPolicies()
    {
        Gate::define('modify-user', function ($user) {
            if (auth()->user()->isAdmin()) {
                return true;
            }
            return false;
        });
    }

    public function registerEventPolicies()
    {
        Gate::define('publish-event', function ($user, Event $event) {
            if (auth()->user()->isAdmin() && $event->event_status === EventStatusType::getInstance(EventStatusType::Moderation)->key) {
                return true;
            }
            return false;
        });

        Gate::define('update-event-seo', function ($user, Event $event) {
            if ((auth()->user()->isOrganiser()) && $event->event_status === EventStatusType::getInstance(EventStatusType::Published)->key) {
                return false;
            }
            if (auth()->user()->isOrganiser() || auth()->user()->isAdmin()) {
                return true;
            }
            return false;
        });
    }
}
