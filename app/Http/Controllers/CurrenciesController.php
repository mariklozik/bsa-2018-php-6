<?php

namespace App\Http\Controllers;


use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;

class CurrenciesController extends Controller
{
    private $currency;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currency = $repository;
    }

    public function getActiveCurrencies()
    {
        $activeCurrencies = $this->currency->findActive();

        return response()->json($this->objectToArray($activeCurrencies), 200);
    }
    public function getCurrencyById($id)
    {
        $currency = $this->currency->findById($id);

        $response = !is_null($currency) ?
            response()->json(CurrencyPresenter::present($currency), 200) :
            response()->json('Currency '.$id.' not found', 404);

        return $response;
    }

    public function objectToArray($arrayObjects)
    {
        $arrayArrays = [];
        foreach ($arrayObjects as $currency)
        {
            $arrayArrays[] = CurrencyPresenter::present($currency);
        }

        return $arrayArrays;
    }
}