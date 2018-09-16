<?php declare(strict_types=1);

namespace InsuranceApp\Tests;

use InsuranceApp\Company;
use InsuranceApp\CompanyRepository;
use InsuranceApp\InsuranceService;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class InsuranceServiceTest extends TestCase
{
    /** @test */
    public function throwsExceptionOnDirectorNameMismatch(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', false)
        );

        $this->expectException(InvalidArgumentException::class);

        (new InsuranceService($companiesHouseApi))
            ->qualifiesForInsurance(123, 'John Smith');
    }

    /** @test */
    public function returnsTrueIfCompanyHasNoInsolvencyHistory(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', false)
        );

        self::assertTrue(
            (new InsuranceService($companiesHouseApi))
                ->qualifiesForInsurance(123, 'Jon Doe')
        );
    }

    /** @test */
    public function returnsFalseIfCompanyHasInsolvencyHistory(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', true)
        );

        self::assertFalse(
            (new InsuranceService($companiesHouseApi))
                ->qualifiesForInsurance(123, 'Jon Doe')
        );
    }

    private function mockCompanyRepository(Company $company): MockObject
    {
        $repository = $this->createMock(CompanyRepository::class);
        $repository->method('getCompany')->with($company->getNumber())->willReturn($company);

        return $repository;
    }
}
