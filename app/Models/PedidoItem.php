<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id','produto_id', 'qt_produto', 'vl_produto'];
    protected $table = 'tb_pedidoitens';

    public function produto(){
        return produto::where('id','=', $this->produto_id)->first();
    }

    public static function total($pedido){

        $itens = PedidoItem::where('pedido_id',$pedido)->get();
        $total = 0;

        foreach($itens as $item){
            $total += $item->produto()->vl_produto * $item->qt_produto;
        }

        return $total;
    }

    public static function quantidade($pedido){

        $itens = PedidoItem::where('pedido_id',$pedido)->get();
        $total = 0;

        foreach($itens as $item){
            $total += $item->qt_produto;
        }

        return $total;
    }

}
