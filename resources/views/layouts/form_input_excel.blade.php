<div class="justify-around block md:flex">    
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="fecha_desde" class="block mb-2 text-sm font-medium text-gray-900">Fecha desde</label>
        <input type="date" id="fecha_desde" name="fecha_desde" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div> 
    <div class="mb-3 md:w-2/4">
        <label for="fecha_hasta" class="block mb-2 text-sm font-medium text-gray-900">Fecha hasta</label>
        <input type="date" id="fecha_hasta" name="fecha_hasta" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>
</div>

<div class="justify-around block md:flex">    
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Sm_Av" class="block mb-2 text-sm font-medium text-gray-900">Sm/Av.</label>
        <input type="text" id="Sm_Av" name="Sm_Av" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" required>
    </div>         
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Id_medida_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus</label>
        <select id="Id_medida_fk" name="Id_medida_fk">    
            <option value="">Selecciona un valor</option>
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
        <label for="id_tipoLuminaria_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Luminaria</label>
        <select id="id_tipoLuminaria_fk" name="id_tipoLuminaria_fk">
            <option value="">Selecciona un valor</option>
            @if (isset($tipo_luminaria))
                @foreach ($tipo_luminaria as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
        
    {{--  --}}
    <div class="mb-3 md:w-2/4">
        <label for="Circuito" class="block mb-2 text-sm font-medium text-gray-900">No Circuito</label>
        <input type="text" id="Circuito" name="Circuito" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">        
    </div>                                  
</div>

{{-- <div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="NumMedidor" class="block mb-2 text-sm font-medium text-gray-900">No. Medidor</label>
        <input type="text" id="NumMedidor" name="NumMedidor" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>    

    <div class="mb-3 md:w-2/4">
        <label for="Luminarias" class="block mb-2 text-sm font-medium text-gray-900">Luminarias instaladas</label>
        <input type="number" id="Luminarias" name="Luminarias" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500" min="0" value="1">
    </div> 
</div>   --}}

<div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_estatus_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus del poste</label>
        <select id="Id_estatus_fk" name="Id_estatus_fk">
            <option value="">Selecciona un valor</option>
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
            <option value="">Selecciona un valor</option>                        
            @if (isset($lamparas))
                @foreach ($lamparas as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>                                              
</div> 

{{-- <div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="id_tipoLuminaria_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Luminaria</label>
        <select id="id_tipoLuminaria_fk" name="id_tipoLuminaria_fk">
            <option value="">Selecciona un valor</option>
            @if (isset($tipo_luminaria))
                @foreach ($tipo_luminaria as $row)
                    <option value="{{$row->id_lampara}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    
    <div class="mb-3 md:w-2/4">
        <label for="Id_potencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potencia (Watts)</label>
        <select id="Id_potencia_fk" name="Id_potencia_fk">
            <option value="">Selecciona un valor</option>
            @if (isset($potencia))
                @foreach ($potencia as $row)
                    <option value="{{$row->id_potencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
</div>  --}}
  
{{-- <div class="justify-around block md:flex">      
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Etiqueta" class="block mb-2 text-sm font-medium text-gray-900">No. de Etiqueta</label>
        <input type="text" id="Etiqueta" name="Etiqueta" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:border-blue-500">
    </div>
    
    <div class="mb-3 md:w-2/4">
        <label for="Id_poste_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de poste</label>
        <select id="Id_poste_fk" name="Id_poste_fk">
            <option value="">Selecciona un valor</option>                        
            @if (isset($tipoposte))
                @foreach ($tipoposte as $row)
                    <option value="{{$row->id_poste}}">{{$row->descripcion}}</option>
                @endforeach        
            @endif            
        </select>
    </div>                 
</div>    --}}

{{-- <div class="justify-around block md:flex">
    <div class="mb-3 md:w-2/4 md:mr-4">
        <label for="Id_dependencia_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dependencia</label>
        <select id="Id_dependencia_fk" name="Id_dependencia_fk">
            <option value="">Selecciona un valor</option>
            @if (isset($dependencia))
                @foreach ($dependencia as $row)
                    <option value="{{$row->id_dependencia}}">{{$row->descripcion}}</option>                                                    
                @endforeach        
            @endif            
        </select>
    </div>
    
    <div class="mb-3 md:w-2/4">
        <label for="Id_altura_fk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Altura</label>
        <select id="Id_altura_fk" name="Id_altura_fk">
            <option value="">Selecciona un valor</option>
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
</div> --}}