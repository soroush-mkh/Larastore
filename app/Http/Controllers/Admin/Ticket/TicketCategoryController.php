<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Content\PostCategory;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $ticketCategories = TicketCategory::all();
        return view('admin.ticket.category.index' , compact('ticketCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('admin.ticket.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store ( TicketCategoryRequest $request )
    {
        $input          = $request->all();
        $ticketCategory = TicketCategory::create($input);

        return redirect()->route('admin.ticket.category.index')->with('swal-success' , 'دسته بندی با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show ( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ( TicketCategory $ticketCategory )
    {
        return view('admin.ticket.category.edit' , compact('ticketCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update ( TicketCategoryRequest $request , TicketCategory $ticketCategory )
    {
        $input = $request->all();
        $ticketCategory->update($input);

        return redirect()->route('admin.ticket.category.index')->with('swal-success' , 'دسته بندی با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ( TicketCategory $ticketCategory )
    {
        $result = $ticketCategory->delete();
        return redirect()->route('admin.ticket.category.index')->with('swal-success' , 'دسته بندی با موفقیت حذف شد.');
    }

    public function status ( TicketCategory $ticketCategory )
    {
        $ticketCategory->status = $ticketCategory->status == 0 ? 1 : 0;
        $result               = $ticketCategory->save();

        if ( $result )
        {
            if ( $ticketCategory->status == 0 )
            {
                return response()->json([ 'status' => TRUE , 'checked' => FALSE ]);
            }
            else
            {
                return response()->json([ 'status' => TRUE , 'checked' => TRUE ]);
            }
        }
        else
        {
            return response()->json([ 'status' => FALSE ]);
        }
    }
}
