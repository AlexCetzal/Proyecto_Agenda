<div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Actividad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="activityForm">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="section" id="sectionId" value="{{ request()->path() }}">
                        <label for="activityName" class="form-label">Nombre de la actividad</label>
                        <input type="text" class="form-control" id="activityName" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Vehiculos" class="form-label">Vehiculos</label>
                        <select class="form-control" id="vehiculos" name="vehiculos">
                            <option value="">Selecciona el tipo de transporte</option>
                            <option value="Chevrolet_Malibu">Chevrolet malibu</option>
                            <option value="Chevrolet_Suburban">Chevrolet Suburban</option>
                            <option value="Dodger_Ram">Dodger Ram</option>
                            <option value="Ford_Expedition">Ford Expedition</option>
                            <option value="GMC_Terrain">GMC Terrain</option>
                            <option value="Toyota_Sienna">Toyota Sienna</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="activityDate" class="form-label">Fecha inicio</label>
                        <input type="text" class="form-control" id="startDate" name="start" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="startTime" class="form-label">Hora de inicio</label>
                        <input type="time" class="form-control" id="startTime" name="startTime">
                    </div>
                    <div class="mb-3">
                        <label for="activityDate" class="form-label">Fecha terminacion</label>
                        <input type="text" class="form-control" id="endDate" name="end">
                    </div>
                    <div class="mb-3">
                        <label for="endTime" class="form-label">Hora de finalización</label>
                        <input type="time" class="form-control" id="endTime" name="endTime">
                    </div>
                    <div class="mb-3">
                        <label for="activityDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="activityDescription" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Actividad guardada exitosamente.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Error al guardar la actividad.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $('#activityForm').on('submit', function(e) {
        e.preventDefault();
        console.log($(this));

        $.ajax({
            url: '/events', // La ruta al controlador 'store'
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                successToast.show();
                $('#activityModal').modal('hide');
                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(xhr) {
                var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                errorToast.show();
                // console.log(xhr.responseText);
                if (xhr.status === 400) {
                    $('#errorToast .toast-body').text(xhr.responseJSON.error);
                } else {
                    $('#errorToast .toast-body').text('Ocurrió un error. Por favor, intenta de nuevo.');
                }


            }
        });
    });
</script>
