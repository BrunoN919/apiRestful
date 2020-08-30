<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $cliente;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(cliente $cliente)
    {
        //
        $this->cliente = $cliente;
    }

    //
    public function index()
    {
        $cliente = $this->cliente->paginate(10);
        return response()->json($cliente,Response::HTTP_OK);
    }

    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        return response()->json($cliente,Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validadator =  Validator::Make([
            $request->all(),
            [
                'nome' => 'required | max:100',
                'email' => 'required | unique',
                'telefone' => 'required | max: 11',
                'dataDeNascimento' => 'required',
                'endereco' => 'required',
                'complemento' => 'required',
                'bairro' => 'required',
                'cep' => 'required'
            ]
        ]);
        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validaçao de dados']
                ],
                Response::HTTP_BAD_REQUEST
            );
        }else{
            $cliente = $this->cliente->create($request->all());
            return response()->json(
                $cliente,
                ['data' =>
                    ['message' => 'Cliente criada com sucesso.']
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
                'nome' => 'required | max:100',
                'email' => 'required | unique',
                'telefone' => 'required | max: 11',
                'dataDeNascimento' => 'required',
                'endereco' => 'required',
                'complemento' => 'required',
                'bairro' => 'required',
                'cep' => 'required'
            ]
        ]);
        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validaçao de dados']
                ],
                Response::HTTP_OK
            );
        }else{
            $cliente = $this->cliente->find($id);

            $cliente->update($request->all());

            return response()->json($cliente,
                ['data' =>
                    ['message' => 'Cliente atualizada com sucesso.']
                ],
                Response::HTTP_OK
            );
        }
    }

    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);

        $cliente->delete();

        return response()->json(
            ['data' =>
                ['message' => 'Cliente removido com sucesso.']
            ],
            Response::HTTP_OK
        );
    }
}
