<?php

namespace App\Http\Controllers;

use App\Pastel;
use Illuminate\Http\Request;

class PastelController extends Controller
{
    private $pastel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(pastel $pastel)
    {
        //
        $this->pastel = $pastel;
    }

    //
    public function index()
    {
        $pastel = $this->pastel->paginate(10);
        return response()->json($pastel,Response::HTTP_OK);
    }

    public function show($id)
    {
        $pastel = $this->pastel->find($id);
        return response()->json($pastel,Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validadator =  Validator::Make([
            $request->all(),
            [
                'nome' => 'required | max:100',
                'preco' => 'required',
                'foto' => 'required | image'
            ]
        ]);

        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validação de dados']
                ],
                Response::HTTP_BAD_REQUEST);
        }else{
            $pastel = $this->pastel->create($request->all());

            $img = base64_encode(file_get_contents($request->file('image')->pat‌​h()));

            $pastel->foto = $img;

            $pastel->save();

            return response()->json(
                ['data' =>
                    ['message' => 'Item criado com sucesso.']
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
                'preco' => 'required',
                'foto' => 'required | image'
            ]
        ]);

        if($validadator->fails()){
            return response()->json(
                ['data' =>
                    ['message' => 'Ocorreu um erro na validação de dados']
                ],
                Response::HTTP_BAD_REQUEST);
        }else{
            $pastel = $this->pastel->find($id);

            $pastel->update($request->all());

            $img = base64_encode(file_get_contents($request->file('image')->pat‌​h()));

            $pastel->foto = $img;
            $pastel->save();

            return response()->json($pastel,
                ['data' =>
                    ['message' => 'Item atualizado com sucesso.']
                ],Response::HTTP_OK
            );
        }
    }

    public function destroy($id)
    {
        $pastel = $this->pastel->find($id);

        $pastel->delete();

        return response()->json(
            ['data' =>
                ['message' => 'Item removido com sucesso.']
            ],
            Response::HTTP_OK
        );
    }
}
