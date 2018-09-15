<?php declare(strict_types=1);

namespace Example;

/**
 * Pseudo code
 */
final class HttpClient
{
    public function makeRequest(array $request): array
    {
        return [
            'number' => 123,
            'directorName' => 'Jon Doe',
            'hasInsolvencyHistory' => false,
        ];
    }
}