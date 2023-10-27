<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $usuarios = User::all()->count();

        //Grafico 1
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        foreach ($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        $userLabel = "'comparativo de cadastros de usuarios'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);


        //Grafico 2
        $catData = Categoria::with('produtos')->get();

        foreach ( $catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
        }

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('catLabel','catTotal','usuarios', 'userLabel','userAno','userTotal'));
    }
}
