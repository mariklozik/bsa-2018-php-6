<?php

namespace App\Http\Controllers;


use App\Services\Currency;
use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use Illuminate\Http\Request;

class AdminCurrenciesController extends Controller
{
    private $currencyRepository;
    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currencyRepository = $repository;
    }

    public function index()
    {
        $allCurrencies = $this->currencyRepository->findAll();
        return response()->json($this->objectToArray($allCurrencies), 200);
    }
    public function show($id)
    {
        $currency = $this->currencyRepository->findById($id);

        $response = !is_null($currency) ?
            response()->json(CurrencyPresenter::present($currency), 200) :
            response()->json('Currency '.$id.' not found', 404);

        return $response;
    }
    public function destroy($id)
    {
        $currency = $this->currencyRepository->findById($id);
        if(!is_null($currency)){
            $this->currencyRepository->delete($currency);
            $response = response()->json('deleted '.$id, 200);
        } else {
            $response = response()->json('Currency '.$id.' not found', 404);
        }

        return $response;
    }

    public function store(Request $request)
    {
        $date = new \DateTime(gmdate('d-m-Y', $request->input('actual_course_date')));

        $newCurrency = new Currency(
            $request->input('id'),
            $request->input('name'),
            $request->input('short_name'),
            $request->input('actual_course'),
            $date,
            $request->input('active')
        );

        $this->currencyRepository->save($newCurrency);

        return response()->json('saved', 200);
    }

    public function update(Request $request, $id){

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