<?php declare(strict_types=1);

namespace InsuranceApp;

use InvalidArgumentException;

final class QualifiesForInsurance
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function __invoke(int $companyNumber, string $companyDirectorName): bool
    {
        $company = $this->companyRepository->getCompany($companyNumber);

        if ($company->getDirectorName() !== $companyDirectorName) {
            throw new InvalidArgumentException('Director name mismatch');
        }

        return $company->hasInsolvencyHistory() === false;
    }
}