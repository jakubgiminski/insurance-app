# Insurance App

## Project objectives
Create a service that determines if a company qualifies for insurance based on its number and director name.
Company should be fetched from an external source. Company qualifies for insurance if:
- provided director name matched company's director name
- company has no insolvency history.

## Required software 
```
php7.1 or higher
```

## Install dependencies 
```
composer install
```

## Run tests
```
vendor/bin/phpunit tests --colors --testdox
```

## Execute example
```
php example/use_case.php
```

## Api Documentation
```php
InsuranceApp\InsuranceService::qualifiesForInsurance(
    int $companyNumber, 
    string $companyDirectorName
): bool
```
