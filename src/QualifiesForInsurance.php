<?php declare(strict_types=1);

namespace InsuranceApp;

class QualifiesForInsurance
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function __invoke(int $companyNumber, string $companyDirectorName): bool
    {
        $company = $this->companyRepository->get($companyNumber);

        if ($company->getDirectorName() !== $companyDirectorName) {
            throw new \InvalidArgumentException('Director name mismatch');
        }

        return $company->hasInsolvencyHistory() === false;
    }
}