<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CardService {

    public function getPrices($cardId) {

        $prices = DB::table('prices')
            ->join('card2price', 'prices.id', '=', 'card2price.price_id')
            ->where('card2price.card_id', '=', $cardId)
            ->select(['prices.name', 'card2price.price', 'prices.discount'])
            ->get();
        $result = [];
        foreach ($prices as $price) {
            $result[$price->name] = round($price->price * ((100 - $price->discount) / 100) , 2);
        }

        return $result;
    }

    public function getTable($cards) {

        $defaultCards = [];
        foreach ($cards as $card) {
            $defaultCards[$card->type] = false;
        }

        $allIncludes = DB::table('card2includes')
            ->join('cards', 'card2includes.card_id', '=', 'cards.id')
            ->join('incs', 'card2includes.includes_id', '=', 'incs.id')
            ->select(['cards.type', 'incs.name', 'incs.id as incs_id', 'incs.beta', 'card2includes.show'])
            ->get();

        $table = [];
        foreach ($allIncludes as $inc) {
            if (!isset($table[$inc->incs_id])) {
                $table[$inc->incs_id] = [
                    'name' => $inc->name,
                    'beta' => (bool)$inc->beta,
                    'includes' => $defaultCards,
                    'show' => '',
                ];
            }
            $table[$inc->incs_id]['includes'][$inc->type] = true;
            if ($inc->show === 1) {
                $table[$inc->incs_id]['show'] = $inc->type;
            }
        }
        return array_values($table);
    }
}
