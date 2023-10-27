<!-- Modal Structure -->
<div id="delete-{{$produto->id}}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i>Tem certeza?</h4>
        <form class="col s12">
            <div class="row">
                <p>
                    Tem certeza que deseja excluir {{$produt->nome}}?
                </p>
            </div>
            <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a><br>
            <button  class="waves-effect waves-green btn red right">Excluir</button><br>
        </form>
    </div>
