<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $expenseParMois = Expense::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('month')->paginate(12);

       $expenseParJours = Expense::select(
                        DB::raw('Day(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('day','month','year')->paginate(30);

        $expenses = Expense::paginate(25);
        return view('expense.index',compact('expenses','expenseParMois','expenseParJours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('expense.create');
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
            'date' => 'required',
            'title' => '',
            'total' => 'required',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
        return view('expense.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'total' => 'required'
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
        $expense->delete();
        return redirect()->back();
    }
}
