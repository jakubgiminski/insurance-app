<?php declare(strict_types=1);

namespace InsuranceApp;

interface CompanyRepository
{
    public function getCompany(int $companyNumber): Company;
}