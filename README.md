# Ciąg Sterna-Brocota

## Uruchomienie ##

Na początek należy zbudować środowisko, przez uruchomienie polecenia:

```bash
composer install
```

#### w przeglądarce ####

```bash
php bin/console server:run
```
Następnie wprowadzić w przeglądarce adres: http://127.0.0.1:8000/

#### w konsoli ####

```bash
php bin/console app:seq-max-value
```

Następnie wprowadzać w konsoli kolejne wartości i potwierdzać Enterem

**alternatywnie:**

Można przekazać plik z gotową listą wartości:

```bash
php bin/console app:seq < tests/Resources/example-in.txt
```

#### testów ####

```bash
bin/phpunit
```


