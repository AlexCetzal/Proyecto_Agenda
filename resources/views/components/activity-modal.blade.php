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
                        <label for="activityDate" class="form-label">Fecha inicio</label>
                        <input type="text" class="form-control" id="startDate" name="start" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="activityDate" class="form-label">Fecha terminacion</label>
                        <input type="text" class="form-control" id="endDate" name="end">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script>
    $('#activityForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/events', // La ruta al controlador 'store'
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Actividad guardada exitosamente');
                $('#activityModal').modal('hide');
                location.reload(); // Recargar la página para actualizar el calendario
            },
            error: function(xhr) {
                alert('Error al guardar la actividad');
                console.log(xhr.responseText);
            }
        });
    });

</script>
