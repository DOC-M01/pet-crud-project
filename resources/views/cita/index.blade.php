@extends('layouts.app')
@section('content')
<div class="container">
    <div id="calendar">
        <!-- View Calendar -->
    </div>
</div>

<div class="modal fade" id="newevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" id="FormPet">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="d-none" id="id" name="id">

                            <label for="title">Tipo servicio</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId">

                            <br>
                            <h6><b>Datos del dueño</b></h6>

                            <label for="documentOwner">Número documento</label>
                            <input type="number" class="form-control" id="documentOwner" name="documentOwner">

                            <label for="nameOwner">Nombres y apellidos</label>
                            <input type="text" class="form-control" id="nameOwner" name="nameOwner">

                            <label for="numberOwner">Número</label>
                            <input type="number" class="form-control" id="numberOwner" name="numberOwner">
                        </div>

                        <div class="col-md-6 mb-3">
                            <h6><b>Datos de la mascota</b></h6>

                            <label for="namePet">Nombre</label>
                            <input type="text" class="form-control" id="namePet" name="namePet">

                            <label for="descripcionPet">Descripción del servicio</label>
                            <textarea class="form-control" name="descripcionPet" id="descripcionPet"
                                rows="3"></textarea>

                            <input type="date" class="form-control d-none" name="start" id="start" aria-describedby="helpId">
                            <input type="date" class="form-control d-none" name="end" id="end" aria-describedby="helpId">
                            
                            <label for="timePet">Hora</label>
                            <input type="time" class="form-control" name="timePet" id="timePet">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSave">Guardar</button>
                <button type="button" class="btn btn-info" id="btnUpdate">Actualizar</button>
                <button type="button" class="btn btn-danger" id="btnDelete">Eliminar cita</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection