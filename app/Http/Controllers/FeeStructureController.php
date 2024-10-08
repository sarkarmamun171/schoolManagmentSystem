<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function fee_str_add(){
        return view('admin.fee-structure.fee_structure_add');
    }
}
