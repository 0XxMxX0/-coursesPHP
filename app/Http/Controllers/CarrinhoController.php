<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id'=> $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);
        return redirect()->route('site.carrinho')->with('sucesso','Produto Adicionado com sucesso!');
    }

    public function removecarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto Removido com sucesso!');
    }

    public function atualizacarrinho(Request $request){
        \Cart::update($request->id,[
            'quantity' =>[
                'relative' => false,
                'value'=> abs($request->quantity)
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto Atualizado com sucesso!');
    }

    public function limparcarrinho(){
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carinho esta vazio!');
    }
}
