<?php

namespace App\Http\Controllers;


use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepository;

class CurrenciesController extends Controller
{
    public function getActiveCurrencies(CurrencyRepository $repository)
    {
        $activeCurrencies = $repository->findActive();

        return response()->json( $this->objectToArray($activeCurrencies)  );
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