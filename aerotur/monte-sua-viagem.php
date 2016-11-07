<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $monte = get_ativar();
 ?>
 <section style="<?php if($monte['ativar_monte'] == false){echo 'display:none;';} ?>" id="monte">
   <div class="container-fluid container_testehover space-down">
     <div class="row">
       <div class="container">
         <div class= "col-xs-12 col-md-12 no-padding-right">
           <?
           $args_post = array('post_type' => 'monte_sua_viagem');
           $myposts_post = get_posts( $args_post );
           foreach ( $myposts_post as $post_post ){
               setup_postdata( $post_post );
               $id2 = $post_post->ID;
               $monte = get_monte_sua_viagem($id2);
            ?>
            <div class="outer-div">
              <div class="pull-right outer-form">
                <div class="col-xs-12 monte-form-box">
                  <form method="post" id="form_contato_topo">
                  <div class="col-xs-6">

                    <div class="form-group">
                      <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="NOME">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="inputCidade" name="inputCidade" placeholder="CIDADE">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control inputTelefone" id="inputTelefone" name="inputTelefone" placeholder="TELEFONE FIXO">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="inputDestino" name="inputDestino" placeholder="PARA ONDE VOCÊ QUER VIAJAR?">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="inputEmbarque" name="inputEmbarque" placeholder="CIDADE DE EMBARQUE">
                    </div>

                    <div class="form-group">
                      <select class="form-control" id="inputPessoas" name="inputPessoas">
                        <option>QUANTAS PESSOAS</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <textarea class="form-control textarea-box" rows="3" id="inputObservacoes" name="inputObservacoes" placeholder="OBSERVAÇÕES"></textarea>
                    </div>

                  </div>

                  <div class="col-xs-6">

                    <div class="form-group">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="EMAIL">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" id="inputUF" name="inputUF" placeholder="ESTADO">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="CELULAR">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" id="inputIDA" name="inputIDA" placeholder="DATA DE IDA">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" id="inputVolta" name="inputVolta" placeholder="DATA DE VOLTA">
                    </div>

                    <div class="form-group">
                      <select class="form-control" id="inputTipo" name="inputTipo">
                        <option>TIPO DE VIAGEM</option>
                        <option>LAZER</option>
                        <option>CORPORATIVO</option>
                        <option>EVENTOS</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select class="form-control" id="inputForma" name="inputForma">
                        <option>FORMA DE CONTATO</option>
                        <option>CELULAR</option>
                        <option>TELEFONE</option>
                        <option>EMAIL</option>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-danger btn-block">ENVIAR</button>

                  </div>

                  </form>
                </div>
              </div> <!-- /OUTER FORM -->
              <div class="monte-box-form-footer pull-right">
                <span class="center-block text-center monte-sua-viagem">Monte sua viagem</span>
              </div>
            </div>

           <? } ?>
         </div>
       </div>
       <div id="detalhar_pacote"></div>
     </div>
   </div>
</section>
