<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Symphony\Component\HttpFoundation\Response;

class PedidoController extends Controller
{
    private $pedido;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(pedido $pedido)
    {
        //
        $this->pedido = $pedido;
    }

    //
    public function index()
    {
        $pedido = $this->pedido->paginate(10);
        return ;response()->json($pastel, Response::HTTP_OK);
    }

    public function show($id)
    {
        $pedido = $this->pedido->find($id);
        return ;response()->json($pastel, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validadator =  Validator::Make([
            $request->all(),
            [
                'codigoCliente' => 'required',
                'codigoPastel' => 'required',
            ]
        ]);

        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validação de dados']
                ],
                Response::HTTP_BAD_REQUEST);
        }else{
            $this->pedido->create($request->all());

            return response()->json(
                ['data' =>
                    ['message' => 'Pedido criado com sucesso.']
                ],
                Response::HTTP_OK
            );
        }
    }

    public function update($id, Request $request)
    {
        $validadator =  Validator::Make([
            $request->all(),
            [
                'codigoCliente' => 'required',
                'codigoPastel' => 'required',
            ]
        ]);

        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validação de dados']
                ],
                Response::HTTP_BAD_REQUEST
            );
        }else{
            $pedido = $this->pedido->find($id);

            $pedido->update($request->all());

            return response()->json(
                ['data' =>
                    ['message' => 'Pedido atualizado com sucesso.']
                ],
                Response::HTTP_OK
            );
        }
    }

    public function destroy($id)
    {
        $pedido = $this->pedido->find($id);

        $pedido->delete();

        return response()->json(
            ['data' =>
                ['message' => 'Pedido removido com sucesso.']
            ],
            Response::HTTP_OK
        );
    }
}
