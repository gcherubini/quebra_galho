<div class="modal modal_nova_avaliacao modal-xs fade" id="modal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Avalie o serviço prestado! </h4>
      </div>

      <form class="avaliar_como_contratante_form">
        <div class="modal-body">        

          <input type="hidden" name="id_servico_e_contratado" class="id_servico_e_contratado_input_hidden" value="">

          <textarea placeholder="Descreva como foi o serviço prestado" class="form-control" rows="5" name="descricao_do_servico" maxlength="255"></textarea>
                      
          <select  class="form-control nota chosen-select" name="numero_estrelas" placeholder="Qual a nota para o prestador de serviço?">
              <option value=""> Qual a nota para o prestador de serviço? </option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
          </select>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default avaliar_como_contratante_submit"> Avaliar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Avaliar depois</button>
        </div>

      </form>
    </div>
    
  </div>
</div>