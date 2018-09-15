# Insurance App

### Required software 
```
php7.1 or higher
```

### Install dependencies 
```
composer install
```

### Run tests
```
vendor/bin/phpunit tests --colors --testdox
```

### Execute example
```
php example/use_case.php
```

### Api Documentation
```php
InsuranceApp\QualifiesForInsurance::__invoke(
    int $companyNumber, 
    string $companyDirectorName
): bool
```
