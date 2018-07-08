<?php
namespace App\Services;


class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct($currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies;
    }
    public function findActive(): array
    {
        $activeCurrencies = [];
        foreach ($this->currencies as $c){
            if($c->isActive()) $activeCurrencies[] = $c;
        }

        return $activeCurrencies;
    }
    public function findById(int $id): ?Currency
    {
        return Currency::class;
    }
    public function save(Currency $currency): void
    {

    }
    public function delete(Currency $currency): void
    {

    }
}