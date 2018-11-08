<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class EntregaFormRequest extends Request
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'idarticulo'=>'required',
            'idempleado'=>'required',
            'iddetalle_entrega'=>'required',
            'cantidad'=>'required|max:10',
            'fecha'=>'required',
            'codigo'=>'required',
            'estado'=>'required'
            
            
        ];
    }
}
