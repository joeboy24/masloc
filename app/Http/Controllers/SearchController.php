<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use db;

class SearchController extends Controller
{
    //

    public function quesearch2()
    {
        # code...
    }

    public function quesearch(Request $request){

        return view('dash.script_check');

        if($request->ajax()){
            $output="";
            $c = 1;

            $results=DB::table('questions')->where('question','LIKE','%'.$request->search."%")->orderBy('id', 'desc')->get();
            if($results){
                foreach ($results as $result) {
                    if($result->del != 'yes'){

                        if ($c % 2 == 0) {
                            $tr = '<tr class="rowColour"><td>'.$c++.'</td>';
                        }else{
                            $tr = '<tr><td>'.$c++.'</td>';
                        }
                        $output.=$tr.
                        '<td>'.$result->question.'</td>
                        <td>'.$result->answer.'</td>
                        </tr>
                        ';
                    }
                }
                return Response($output);
            }
        
        }
    }
}
