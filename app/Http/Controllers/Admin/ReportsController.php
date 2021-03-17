<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class ReportsController extends Controller
{
    private $title = 'Manage Reports';
    public function index()
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $year = ['2015','2016','2017','2018','2019','2021'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = Order::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
        return view('admin.reports.index',['title' => $this->title])->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }


}
