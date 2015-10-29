<div class="modal modal_nova_avaliacao modal-xs fade" id="modal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Avalie o serviço prestado! </h4>
      </div>


      <div class="modal-body">
        <textarea placeholder="Descreva como foi o serviço prestado" class="form-control" rows="3" id="descricao" name="descricao" maxlength="180"></textarea>
                    
        <select  class="form-control nota chosen-select" id="nota" name="nota" >
            <option value=""> Qual a nota para o prestador de serviço? </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
        </select>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Avaliar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Avaliar depois</button>
      </div>
    </div>
    
  </div>
</div>