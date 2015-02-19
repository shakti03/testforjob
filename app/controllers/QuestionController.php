<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.question.list');
	}

	public function getDatatable()
    {
        $query = ObjectiveQuestion::all();
		
        return Datatable::collection($query)
        	->showColumns('question','option_a','option_b','option_c','option_d')
        // ->addColumn('',function($model){
        // 	return '<input type="checkbox" name="id[]">';
        // })
        // ->addColumn('',function($model){
        // 	return $model->question;
        // })

        // ->addColumn('',function($model){
        // 	return $model->question;
        // })
        // ->addColumn('',function($model){
        // 	return $model->question;
        // })

        // ->addColumn('',function($model){
        // 	return $model->question;
        // })

        // ->addColumn('',function($model){
        // 	return $model->question;
        // })
        ->make();
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
