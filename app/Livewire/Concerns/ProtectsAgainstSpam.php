<?php

namespace App\Livewire\Concerns;

use Illuminate\Support\Facades\RateLimiter;

/**
 * Honeypot + minimum time-on-page + per-IP rate limiting for public forms.
 */
trait ProtectsAgainstSpam
{
    /** Honeypot: hidden in the UI, so anything here means a bot filled it. */
    public string $website = '';

    /** Unix timestamp of when the form was rendered. */
    public int $loadedAt = 0;

    protected int $minSecondsOnPage = 3;

    protected int $maxSubmissionsPerHour = 5;

    public function mountProtectsAgainstSpam(): void
    {
        $this->loadedAt = now()->getTimestamp();
    }

    /** True when the submission has bot fingerprints; callers should fail silently. */
    protected function looksAutomated(): bool
    {
        return $this->website !== ''
            || (now()->getTimestamp() - $this->loadedAt) < $this->minSecondsOnPage;
    }

    /** True when this IP has submitted too often; adds a friendly error. */
    protected function isRateLimited(): bool
    {
        if (! RateLimiter::tooManyAttempts($this->rateLimitKey(), $this->maxSubmissionsPerHour)) {
            return false;
        }

        $this->addError('form', __('site.spam.rate_limited'));

        return true;
    }

    protected function recordSubmission(): void
    {
        RateLimiter::hit($this->rateLimitKey(), 3600);

        // Restart the clock so a second submission from the same page is still checked.
        $this->loadedAt = now()->getTimestamp();
    }

    protected function rateLimitKey(): string
    {
        return 'form:'.class_basename(static::class).':'.request()->ip();
    }
}
