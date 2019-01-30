@extends('paciente.show')
@section('submodulos')

<div class="row my-5">
    <div class="col-4 px-5">
        <h4>Medidas</h4>
    </div>
    <input id="submenu" type="hidden" name="submenu" value="nav-tallas">
</div>
<div class="row">
    <div class="col-12">
        <form role="form" name="form-talla" id="form-cliente" method="POST" action="{{ route('pacientes.tallas.store', ['paciente'=>$paciente]) }}"
            name="form">
            {{ csrf_field() }}


            <div class="row">
                <div class="form-group col-4">
                    <div class="form-group col-4">
                        <label for="nivel">Sexo:</label>
                        <select class="form-control" name="sexo" id="sexo" required>
                            <option value="">Seleccione</option>
                            <option value="dama">Dama</option>
                            <option value="caballero">Caballero</option>
                        </select>
                    </div>
                    <h5>Compresión</h5>
                    <div class="form-check">
                        <input name="pierna" class="form-check-input" type="checkbox" value="" id="pierna">
                        <label class="form-check-label" for="pierna">
                            Pierna
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="brazo" class="form-check-input" type="checkbox" value="" id="brazo">
                        <label class="form-check-label" for="brazo">
                            Brazo
                        </label>
                    </div>
                </div>

                <div class="form-group col-2">
                    <h5>Estilos Pierna</h5>
                    <div class="form-check">
                        <input name="tobimedia" class="form-check-input" type="checkbox" value="" id="tobimedia">
                        <label class="form-check-label" for="tobimedia">
                            tobimedia
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="media" class="form-check-input" type="checkbox" value="" id="media">
                        <label class="form-check-label" for="media">
                            media
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="pantimedia" class="form-check-input" type="checkbox" value="" id="pantimedia">
                        <label class="form-check-label" for="pantimedia">
                            pantimedia
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="calcetin" class="form-check-input" type="checkbox" value="" id="calcetin">
                        <label class="form-check-label" for="calcetin">
                            calcetin
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="pantorrillera" class="form-check-input" type="checkbox" value="" id="pantorrillera">
                        <label class="form-check-label" for="pantorrillera">
                            pantorrillera
                        </label>
                    </div>
                </div>
                <div class="form-group col-2">
                    <h5>Estilos Brazo</h5>
                    <div class="form-check">
                        <input name="guante" class="form-check-input" type="checkbox" value="" id="guante">
                        <label class="form-check-label" for="guante">
                            guante
                        </label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <h5>Medidas Pierna</h5>
                    <div class="row">
                        <div class="col-3 offset-6">
                            <h6>Izq</h6>
                        </div>
                        <div class="col-3">
                            <h6>Dcha</h6>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Circunferencia Tobillo</span>
                        </div>
                        <input name="circunferencia_tobillo_izq" id="circunferencia_tobillo_izq" type="text" class="form-control">
                        <input name="circunferencia_tobillo_dcha" id="circunferencia_tobillo_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Circunferencia Pantorrilla</span>
                        </div>
                        <input name="circunferencia_tobillo_izq" id="circunferencia_tobillo_izq" type="text" class="form-control">
                        <input name="circunferencia_tobillo_dcha" id="circunferencia_tobillo_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Altura Pantorrilla</span>
                        </div>
                        <input name="altura_pantorrilla_izq" id="altura_pantorrilla_izq" type="text" class="form-control">
                        <input name="altura_pantorrilla_dcha" id="altura_pantorrilla_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Circunferencia Muslo</span>
                        </div>
                        <input name="circunferencia_muslo_izq" id="circunferencia_muslo_izq" type="text" class="form-control">
                        <input name="circunferencia_muslo_dcha" id="circunferencia_muslo_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Altura Pierna</span>
                        </div>
                        <input name="altura_pierna_izq" id="altura_pierna_izq" type="text" class="form-control">
                        <input name="altura_pierna_dcha" id="altura_pierna_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Circunferencia cadera</span>
                        </div>
                        <input name="circunferencia_cadera" id="circunferencia_cadera" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Calzado</span>
                        </div>
                        <input name="calzado_izq" id="calzado_izq" type="text" class="form-control">
                        <input name="calzado_dcha" id="calzado_dcha" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Peso</span>
                        </div>
                        <input name="peso" id="peso" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Estatura</span>
                            </div>
                            <input name="estatura" id="estatura" type="text" class="form-control">
                        </div>
                </div>
                <div class="form-group col-4">
                        <h5>Medidas Brazo</h5>
                        <div class="row">
                            <div class="col-3 offset-6">
                                <h6>Izq</h6>
                            </div>
                            <div class="col-3">
                                <h6>Dcha</h6>
                            </div>
                        </div>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Circunferencia Palma</span>
                            </div>
                            <input name="circunferencia_plama_izq" id="circunferencia_plama_izq" type="text" class="form-control">
                            <input name="circunferencia_plama_dcha" id="circunferencia_plama_dcha" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Circunferencia Muñeca</span>
                            </div>
                            <input name="circunferencia_munieca_izq" id="circunferencia_munieca_izq" type="text" class="form-control">
                            <input name="circunferencia_munieca_dcha" id="circunferencia_munieca_dcha" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Circunferencia parte media</span>
                            </div>
                            <input name="circunferencia_media_izq" id="circunferencia_media_izq" type="text" class="form-control">
                            <input name="circunferencia_media_dcha" id="circunferencia_media_dcha" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Talla</span>
                            </div>
                            <input name="talla_izq" id="talla_izq" type="text" class="form-control">
                            <input name="talla_dcha" id="talla_dcha" type="text" class="form-control">
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">
                        <strong>Guardar</strong>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection