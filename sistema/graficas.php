<!-- Modal -->
<div class="modal fade" id="graficas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Gráficas | Índice de Reprobados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="width: 380px; margin-left: 7rem; display: inline-block;">
                    <canvas id="indiceAsignaturas"></canvas>
                </div>
                <div style="width: 380px; margin-left: 7rem; display: inline-block;">
                    <canvas id="indiceAsignaturasII"></canvas>
                </div>
                <div style="width: 380px; margin-left: 7rem; display: inline-block;">
                    <canvas id="indiceAsignaturasIII"></canvas>
                </div>
                <div style="width: 380px; margin-left: 7rem; display: inline-block;">
                    <canvas id="indiceAsignaturasIV"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
<script src="scripts/graficas.js" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>