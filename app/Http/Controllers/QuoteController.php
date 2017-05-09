<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function get ($id = null)
    {

        if (empty ($id))
        {

            $result = app ("db")
                ->select ("SELECT * FROM quotes ORDER BY RAND() LIMIT 1");

            return $result;

        }

        $result = app ("db")
            ->select ("SELECT * FROM quotes WHERE id = ? LIMIT 1;", [$id]);

        return response ($result);

    }

    public function getAll ()
    {

        $results = app ("db")->select ("SELECT * FROM quotes;");
        return response ($results);

    }

    public function create (Request $request)
    {

         $quote  = $request->input ("quote");
         $author = $request->input ("author");

         if
         (
             ! empty ($quote)
         &&  ! empty ($author)
         ) {

             $newQuote = new Quote ();
             $newQuote->quote = $quote;
             $newQuote->author = $author;

             $newQuote->save();

             return response()->json(["status" => "success"]);

//             $affected = app ("db")
//                 ->insert ("INSERT INTO quotes (quote, author) VALUES (?, ?);", [$quote, $author]);
//
//             $status = $affected > 0
//                 ? "success"
//                 : "failed";
//
//             return response ()->json
//             (
//                 [
//                     "QuoteCreation" =>
//                     [
//                         "status" => "$status"
//                     ]
//                 ]
//             );

         }
         else
         {

             return response ()->json (INVALID_PARAMETERS_ERROR);

         }

    }

    public function delete ($id)
    {

        $result = app ("db")
            ->delete ("DELETE FROM quotes WHERE id = ? LIMIT 1;", [$id]);

        $status = $result ? "success" : "failed";
        
        return response ()->json
        (
            [
                "QuoteDeletion" =>
                [
                    "status" => "$status"
                ]
            ]
        );

    }

}
