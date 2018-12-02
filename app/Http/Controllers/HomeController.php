<?php

namespace App\Http\Controllers;
use App\records;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = records::paginate(10);


        return view('records.index',compact('records'));


    }
    /*
     */
    public function search()
    {
        //
        $searchWord = Input::get('Search');
        $newRecord = records::where('id','LIKE','%'.$searchWord.'%')
                    ->orWhere('AC','LIKE','%'.$searchWord.'%')
                    ->orWhere('Artist','LIKE','%'.$searchWord.'%')
                    ->orWhere('Title','LIKE','%'.$searchWord.'%')
                    ->orWhere('Date','LIKE','%'.$searchWord.'%')
                    ->orWhere('Medium','LIKE','%'.$searchWord.'%')
                    ->orWhere('Dimension','LIKE','%'.$searchWord.'%')
                    ->orWhere('Category','LIKE','%'.$searchWord.'%')
                    ->get();
        if(count($newRecord) > 0)
            return view('records.search',compact('newRecord'))->withDetails($newRecord)->withQuery ( $searchWord );
        else return view('records.search',compact('newRecord'));
    }
}
