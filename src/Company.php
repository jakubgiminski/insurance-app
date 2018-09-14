<?php declare(strict_types=1);

namespace InsuranceApp;

class Company
{
    private $number;

    private $directorName;

    private $hasInsolvencyHistory;

    public function __construct(int $number, string $directorName, bool $hasInsolvencyHistory = false)
    {
        $this->number = $number;
        $this->directorName = $directorName;
        $this->hasInsolvencyHistory = $hasInsolvencyHistory;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDirectorName(): string
    {
        return $this->directorName;
    }

    public function hasInsolvencyHistory(): bool
    {
        return $this->hasInsolvencyHistory;
    }
}