<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info Stations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-center">
                    <img src="src/assets/img/velo.png" width="300">
                </div>
                <h3 id="station_name" class=""></h3>
                <i class="mr-2 mb-3 fas fa-map-marker-alt"></i><small id="station_adress" class="text-muted"/></small>
                <ul>
                <li><i class="mr-3 fas fa-sort"></i>Etat : <span id="status"></span> </li>
                <li><i class="mr-3 fas fa-bicycle"></i>Vélos disponibles : <span id="veloDispo"></span> </li>
                <li><i class="mr-3 fas fa-parking"></i>Places disponibles : <span id="placeDispo"></span></li>
                <li><i class="mr-3 far fa-credit-card"></i><span id="paiementDispo"></span></li></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block btn-danger">Réserver</button>
            </div>
        </div>
    </div>
</div>