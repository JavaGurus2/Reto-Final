<form id="searchForm" action="{{ $route }}" method="GET" class="mb-3">
    <div class="input-group">
        <input id="searchInput" type="text" name="search" class="form-control"
            placeholder="{{ $placeholder }}" value="{{ request()->input('search') }}">
    </div>
</form>

<div id="noMoviesMessage" class="alert alert-warning mt-3" role="alert" style="display: none;">
    No se encontraron resultados
</div>

<div id="tableContainer" class="table-responsive">
    <table id="indexTable" class="table table-bordered table-dark table-hidden">
        <thead class="bg-dark">
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Fecha estreno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se añaden las filas de la tabla -->
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('searchInput').addEventListener('input', function () {
            var searchText = this.value.toLowerCase();
            var rows = document.querySelectorAll('#indexTable tbody tr');
            var noMoviesMessage = document.getElementById('noMoviesMessage');
            var tableContainer = document.getElementById('tableContainer');


            var moviesFound = false;

            rows.forEach(function (row) {
                var title = row.cells[1].textContent.toLowerCase();
                var nombre = row.cells[0].textContent.toLowerCase();

                if (title.includes(searchText) || nombre.includes(searchText)) {
                    row.style.display = '';
                    moviesFound = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Mostrar mensaje si no se encuentran películas
            if (!moviesFound) {
                noMoviesMessage.style.display = 'block';
                tableContainer.classList.add('table-hidden');

            } else {
                noMoviesMessage.style.display = 'none';
                tableContainer.classList.remove('table-hidden');
            }
        });
    });

</script>
