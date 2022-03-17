<div class="modal fade" id="editmedidas{{$medida->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar Medida</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/medidas/{{$medida->slug}}">      
                    @csrf
                    @method('put')
                        <div class="py-1">
                            <label for="name_id" class="form-label">Unidad de Medida<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$medida->name}}" id="name_id" class="form-control fw-light form-control-sm" required maxLength="50">
                        </div>

                        <div class="py-1">
                            <label for="" class="form-label">Abreviatura</label>
                            <div class="form-floating">
                            <input type="text" name="abreviatura" id="floatingTextarea2" class="form-control fw-light form-control-sm" value="{{$medida->abreviatura}}"  maxLength="100">
                            <label for="floatingTextarea2">Edita el Contenido</label>
                            @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-tercery px-5 text-white">Actualizar Registro</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>