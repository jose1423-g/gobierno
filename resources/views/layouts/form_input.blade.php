@csrf
<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Sm_Av" class="block mb-2 text-sm font-medium text-gray-900">Sm/Av.</label>
        <input type="text" id="Sm_Av" name="Sm_Av" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">        
        {{-- ERROR --}}
        <span class="hidden text-red-700 hidden_msg" id="msg_error_sm_av"></span>        
    </div> 
    <div class="justify-around block md:flex">
        <div class="mb-3 md:w-2/4">
            <label for="Latitud" class="block mb-2 text-sm font-medium text-gray-900">Latitud</label>
            <input type="text" id="Latitud" name="Latitud" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" readonly>
        </div>
        <div class="mb-3 md:w-2/4">
            <label for="longitud" class="block mb-2 text-sm font-medium text-gray-900">Longitud</label>
            <input type="text" id="Longitud" name="Longitud" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500"  readonly>
        </div>
    </div> 
    <input type="hidden" id="Posicion" name="Posicion" value="0">
    <input type="hidden" id="RPU" name="RPU" value="0">
    <input type="hidden" id="Municipalizado" name="Municipalizado" value="0">    
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_medida_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus</label>
        <select id="Id_medida_fk" name="Id_medida_fk">                        
            @if (isset($lamparas))
                @foreach ($medidas as $row)
                    <option value="{{$row->id_medida}}">{{$row->tipo}} {{$row->descripcion}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
</div>

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_transformador_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad de transformador</label>
        <select id="Id_transformador_fk" name="Id_transformador_fk">                        
            @if (isset($transformador))
                @foreach ($transformador as $row)
                    <option value="{{$row->id_transformador}}">{{$row->tipo}} {{$row->Voltaje}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Circuito" class="block mb-2 text-sm font-medium text-gray-900">No Circuito</label>
        <input type="text" id="Circuito" name="Circuito" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
        {{-- ERROR --}}
        <span class="hidden text-red-700 hidden_msg" id="msg_error_circuito"></span>
    </div>                                  
</div>

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="NumMedidor" class="block mb-2 text-sm font-medium text-gray-900">No. Medidor</label>
        <input type="text" id="NumMedidor" name="NumMedidor" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>    
    {{--  --}}                                 
    <div class="mb-3 md:w-2/4">
        <label for="Luminarias" class="block mb-2 text-sm font-medium text-gray-900">Luminarias instaladas</label>
        <input type="text" id="Luminarias" name="Luminarias" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" value="1">
    </div> 
</div>  
          
<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_estatus_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus del poste</label>
        <select id="Id_estatus_fk" name="Id_estatus_fk">                        
            @if (isset($estatus))
                @foreach ($estatus as $row)
                    <option value="{{$row->id_estatus}}">{{$row->tipo}} {{$row->descripcion}}</option>                                                    
                @endforeach
            @endif
        </select>                    
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_lampara_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tecnologia</label>
        <select id="Id_lampara_fk" name="Id_lampara_fk">                        
            @if (isset($lamparas))
                @foreach ($lamparas as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>                                              
</div> 

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="id_tipoLuminaria_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Luminaria</label>
        <select id="id_tipoLuminaria_fk" name="id_tipoLuminaria_fk">                        
            @if (isset($tipo_luminaria))
                @foreach ($tipo_luminaria as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_potencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potencia (Watts)</label>
        <select id="Id_potencia_fk" name="Id_potencia_fk">                        
            @if (isset($potencia))
                @foreach ($potencia as $row)
                    <option value="{{$row->id_potencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
</div>  
  
<div class="justify-around block md:flex">      
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Etiqueta" class="block mb-2 text-sm font-medium text-gray-900">No. de Etiqueta</label>
        <input type="text" id="Etiqueta" name="Etiqueta" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>     
    {{--  --}}   
    <div class="mb-3 md:w-2/4">
        <label for="Id_poste_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de poste</label>
        <select id="Id_poste_fk" name="Id_poste_fk">                        
            @if (isset($tipoposte))
                @foreach ($tipoposte as $row)
                    <option value="{{$row->id_poste}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>                 
</div>   

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_dependencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dependencia</label>
        <select id="Id_dependencia_fk" name="Id_dependencia_fk">                        
            @if (isset($dependencia))
                @foreach ($dependencia as $row)
                    <option value="{{$row->id_dependencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_altura_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Altura</label>
        <select id="Id_altura_fk" name="Id_altura_fk">                        
            @if (isset($altura))
                @foreach ($altura as $row)
                    <option value="{{$row->id_altura}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="Observaciones" class="block mb-2 text-sm font-medium text-gray-900">Observaciones</label>
    <textarea name="Observaciones" id="Observaciones" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" rows="3"></textarea>
</div>         

<div class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900 bg-opacity-50" id="load_spinner">    
    <div role="status">
        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
</div>
  