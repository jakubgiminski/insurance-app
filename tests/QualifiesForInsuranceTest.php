<?php declare(strict_types=1);

namespace InsuranceApp\Tests;

use InsuranceApp\Company;
use InsuranceApp\CompanyRepository;
use InsuranceApp\QualifiesForInsurance;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class QualifiesForInsuranceTest extends TestCase
{
    /** @test */
    public function throws_exception_on_director_name_mismatch(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', false)
        );

        $this->expectException(InvalidArgumentException::class);

        (new QualifiesForInsurance($companiesHouseApi))(123, 'John Smith');
    }

    /** @test */
    public function returns_true_if_company_has_no_insolvency_history(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', false)
        );

        self::assertTrue(
            (new QualifiesForInsurance($companiesHouseApi))(123, 'Jon Doe')
        );
    }

    /** @test */
    public function returns_false_if_company_has_insolvency_history(): void
    {
        $companiesHouseApi = $this->mockCompanyRepository(
            new Company(123, 'Jon Doe', true)
        );

        self::assertFalse(
            (new QualifiesForInsurance($companiesHouseApi))(123, 'Jon Doe')
        );
    }

    private function mockCompanyRepository(Company $company): MockObject
    {
        $repository = $this->createMock(CompanyRepository::class);
        $repository->method('get')->with($company->getNumber())->willReturn($company);

        return $repository;
    }
}
