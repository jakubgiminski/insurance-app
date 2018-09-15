<?php declare(strict_types=1);

namespace Example;

require __DIR__ . '../../vendor/autoload.php';

use InsuranceApp\QualifiesForInsurance;

/**
 * Use Case: Dump if company qualifies for insurance. In this case, company is
 * read from an imaginary external http API called Companies House Api.
 *
 * This execution will dump true, as director name matches and company has no
 * insolvency history. Change company response in HttpClient in order to produce
 * different results - throw exception in case of director name mismatch or dump
 * false if company has insolvency history.
 */
$companiesHouseApi = new CompaniesHouseApi(new HttpClient());
var_dump((new QualifiesForInsurance($companiesHouseApi))(123, 'Jon Doe'));