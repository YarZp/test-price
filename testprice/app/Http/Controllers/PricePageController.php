<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\CardService;


class PricePageController extends Controller
{

    private CardService $cardService;

    public function __construct(CardService $cardService) {
        $this->cardService = $cardService;
    }

    function getPrice() {
        $totalPrice = [
            'cards' => [],
            'table' => [],
        ];

        $cards = Card::get(['id', 'type', 'description']);
        foreach ($cards as $card) {
            $cardArray = $card->toArray();
            $cardArray['price'] = $this->cardService->getPrices($card->id);
            $totalPrice['cards'][] = $cardArray;
        }

        $totalPrice['table'] = $this->cardService->getTable($cards);

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
        return $totalPrice;
    }
}
