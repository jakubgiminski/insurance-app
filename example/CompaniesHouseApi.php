<?php declare(strict_types=1);

namespace Example;

use InsuranceApp\Company;
use InsuranceApp\CompanyRepository;

/**
 * Pseudo code
 */
final class CompaniesHouseApi implements CompanyRepository
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getCompany(int $companyNumber): Company
    {
        $httpResponse = $this->httpClient->makeRequest([
            'method' => 'GET',
            'url' => "companies/$companyNumber",
        ]);

        return new Company(
            $httpResponse['number'],
            $httpResponse['directorName'],
            $httpResponse['hasInsolvencyHistory']
        );
    }
}