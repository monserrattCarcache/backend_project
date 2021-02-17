<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Mail\sendContact;
use Illuminate\Http\Request;
use Mail;
use contact;


/**
* @OA\Info(title="API Contact", version="1.0")
*
* @OA\Server(url="http://localhost:8000")
*/

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     *
     *
     */



     /**
 * * @OA\Post(
 * * path="/api/contact/store",
 * * summary="Guardar datos de contacto",
 * * @OA\RequestBody(
 * *    @OA\MediaType(
 * *        mediaType="application/json",
 * *         @OA\Schema(
 * *               @OA\Property(
 * *                property="name",
 * *                type="string"
 * *                ),
 * *           @OA\Property(
 * *                property="email",
 * *                type="string"
 * *              ),
 * *            @OA\Property(
 * *                property="phone",
 * *                type="string"
 * *             ),
 * *            @OA\Property(
 * *                property="message",
 * *                type="string"
 * *             ),
 * *            example={"name": "Alberto Urbaez", "email": "hola@gmail.com","phone": "+54 9 351 370000", "message":"Test de envio de email"}
 * *                )
 * *            )
 * *        ),
 * *        @OA\Response(
 * *                response=200,
 * *                description="OK"
 * *            )
 * * )
 * */
    public function store(Request $request)
    {
        //dd($request);
        //dd('test');
        try{
            $contact = new Contacts;
            $contact->name= $request->name ;
            $contact->email= $request->email;
            $contact->phone= $request->phone;
            $contact->message= $request->message;
            Mail::to($request->email)->send(new SendContact());
            $contact->save();

        } catch(\exception $e){
            return response()->json("Se genero un error {$e->getMessage()}",404);
        }
        return response()->json("Mensaje enviado con exito",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacts $contacts)
    {
        //
    }
}
