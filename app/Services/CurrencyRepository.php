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
        foreach ($this->currencies as $c) {
            if($c->isActive()) $activeCurrencies[] = $c;
        }

        return $activeCurrencies;
    }
    public function findById(int $id): ?Currency
    {
        foreach ($this->currencies as $c) {
            if( $c->getId() === $id) {
                return $c;
            }
        }
        return null;
    }
    public function save(Currency $currency): void
    {
        array_push($this->currencies, $currency);
    }
    public function delete(Currency $currency): void
    {
        $id = $currency->getId();
        foreach ($this->currencies as $c) {
            if( $c->getId() === $id) {
                break;
            }
        }
    }

    public function update($request, $id): void
    {
        $this->currencies;

    }
}