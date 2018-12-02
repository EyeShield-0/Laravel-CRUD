<?php

namespace App\Http\Controllers;
use App\records;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $records = records::paginate(10);

        return view('records.index',compact('records'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'AC'=>'required',
            'Artist'=> 'required',
            'Title' => 'required',
            'Date' => 'required',
            'Medium' => 'required',
            'Dimension' => 'required',
            'Category' => 'required',
        ]);
        //AC#	Artist	Title	Date	Medium	Dimensions	Category	Id
        $records = new records([
            'AC' => $request->post('AC'),
            'Artist'=> $request->post('Artist'),
            'Title'=> $request->post('Title'),
            'Date'=> $request->post('Date'),
            'Medium'=> $request->post('Medium'),
            'Dimension'=> $request->post('Dimension'),
            'Category'=> $request->post('Category'),
        ]);
        $records->save();
        return redirect('home')->with('success', 'Record has been added');
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        else return view('records.search',compact('newRecord'))->withMessage('No records found!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $records = records::find($id);

        return view('records.edit', compact('records'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'AC#'=>'required',
            'Artist'=> 'required',
            'Title' => 'required',
            'Date' => 'required',
            'Medium' => 'required',
            'Dimension' => 'required',
            'Category' => 'required',
        ]);

        $records = records::find($id);
        $records->AC = $request->post('AC#');
        $records->Artist = $request->post('Artist');
        $records->Title= $request->post('Title');
        $records->Date= $request->post('Date');
        $records->Medium= $request->post('Medium');
        $records->Dimension= $request->post('Dimension');
        $records->Category= $request->post('Category');



        $records->save();

        return redirect('home')->with('success', 'Record has been updated');
//AC#	Artist	Title	Date	Medium	Dimensions	Category	Id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $records = records::find($id);
        $records->delete();

        return redirect('home')->with('success', 'Record has been deleted Successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'records.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'records.xlsx');

        return redirect('/')->with('success', 'Import success!');
    }

}
