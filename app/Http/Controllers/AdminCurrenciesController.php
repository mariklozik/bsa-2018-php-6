<?php

namespace App\Http\Controllers;


use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;

class AdminCurrenciesController extends Controller
{
    private $currency;
    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currency = $repository;
    }

    public function index()
    {
        $allCurrencies = $this->currency->findAll();
        return response()->json($this->objectToArray($allCurrencies), 200);
    }

    public function show($id)
    {
        $currency = $this->currency->findById($id);

        $response = !is_null($currency) ?
            response()->json(CurrencyPresenter::present($currency), 200) :
            response()->json('Currency '.$id.' not found', 404);

        return $response;
    }

    public function destroy($id)
    {
        $currency = $this->currency->findById($id);
        if(!is_null($currency)){
            $this->currency->delete($currency);
            $response = response()->json('deleted '.$id, 200);
        } else {
            $response = response()->json('Currency '.$id.' not found', 404);
        }

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