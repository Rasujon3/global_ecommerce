<?php

namespace App\Http\Controllers;

use App\Models\Productvariant;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Models\Orderdetail;
use DataTables;

class OrderController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function orderLists(Request $request)
    {
    	if ($request->ajax()) {
            $orders = Orderdetail::latest();

            return DataTables::of($orders)
                ->addIndexColumn()

                ->addColumn('serial', function ($row) {
                	return $row->id;
                })

                ->addColumn('status', function ($row) {
                    return $row->status;
                })

                ->addColumn('action', function ($row) {
                    $viewUrl = url('/')."/show-order/".$row->id;

                    return '
                        <a href="' . $viewUrl . '"
                           class="btn btn-primary btn-sm action-button view-order"
                           data-id="' . $row->id . '">
                            <i class="fa fa-eye"></i>
                        </a>
                        &nbsp;
                        <button type="button"
                           class="btn btn-danger btn-sm delete-order action-button"
                           data-id="' . $row->id . '">
                            <i class="fa fa-trash"></i>
                        </button>
                    ';
                })->filter(function ($instance) use ($request) {

                    if ($request->get('from_date') != "") {
                        $instance->where(function($w) use($request){
                            $w->orWhereDate('orderdetails.created_at', '>=', $request->from_date);
                        });
                    }

                    if ($request->get('to_date') != "") {
                        $instance->where(function($w) use($request){
                            $w->orWhereDate('orderdetails.created_at', '<=', $request->to_date);
                        });
                    }

                    if ($request->get('status') != "") {
                        $instance->where(function($w) use($request){
                            $status = $request->get('status');
                            $w->orWhere('orderdetails.status', $status);
                        });
                    }


                })->setRowID('id')

                ->rawColumns(['status', 'action','serial'])
                ->make(true);
        }

        return view('orders.order_lists');
    }

    public function showOrder($id)
    {
    	$data = Orderdetail::with('orders.product')->findorfail($id);
//        dd(
//            $data->orders[0]->variants,
//            $data->orders[0]->variant_details
//        );
//
//        dd($data->orders[0]->variants, $data->variants, $data?->variant_details);
    	return view('orders.show_invoice', compact('data'));
    }
}
