<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

/**
 * Class QuoteController
 * @package App\Http\Controllers
 */
class QuoteController extends Controller
{

    /**
     * @param null $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function get ($id = null)
    {

        if (empty ($id))
            return response (Quote::inRandomOrder ()->first ());

        return response (Quote::findOrFail ($id));
    }

    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function getAll ()
    {

        return response (Quote::all ());

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create (Request $request)
    {

        $quote  = $request->input ("quote");
        $author = $request->input ("author");

        if (empty ($quote) && empty ($author))
            return response ()->json (INVALID_PARAMETERS_ERROR);

        $newQuote = new Quote ();
        $newQuote->quote = $quote;
        $newQuote->author = $author;

        $status = $newQuote->save ()
             ? "success"
             : "failed";

         return response ()->json (["status" => $status]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function delete ($id)
    {

        $quote = Quote::find ($id);

        $status = $quote->delete ()
            ? "success"
            : "failed";

        return response (["status" => $status]);

    }

}
