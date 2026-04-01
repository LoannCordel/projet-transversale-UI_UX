<?php

declare(strict_types=1);

namespace App\Services;

/**
 * ApiService will be responsible for communicating with the PostgreSQL API.
 * Implement HTTP calls (e.g. via cURL or a lightweight HTTP client) here.
 */
class ApiService
{
    public function __construct(private readonly string $apiBaseUrl)
    {
    }

    /**
     * Example: fetch a resource list from the API.
     *
     * @return array<mixed>
     */
    public function fetchAll(string $endpoint): array
    {
        // TODO: implement real HTTP request to PostgreSQL API
        return [];
    }
}
