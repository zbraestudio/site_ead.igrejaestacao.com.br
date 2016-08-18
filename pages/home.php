<?
html_header();
?>



  <!-- Main -->
  <div id="main">

    <!-- One -->
    <section id="one">
      <div class="container">
        <header class="major">
          <h2>Bem vindo ao EAD LIVRE</h2>
          <p>Essa é nossa plataforma de ensino à distância. </p>
        </header>
        <p>O apóstolo Paulo certa vez disse que a fé vem pelo ouvir a Palavra de Deus. Entendemos assim, que é indispensável conhecermos cada vez mais a respeito das escrituras sagradas. Não seguidos a bíblia, seguido à Cristo. Por mais contraditório que isso possa parecer, faz todo sentido e faz toda a diferença. Porém é sim a Bíblia quem nos contam, de maneira mais próxima, a respeito do nosso Jesus.</p>
        <p>Aproveite esse espaço! Aprenda! Ensine! Caminhe! Cresça!</p>
        <p>Tihh Gonçaves - <i>Diretor do Livres EAD</i></p>
      </div>
    </section>

    <!-- Two -->
    <section id="two">
      <div class="container">
        <h3>Quem pode participar?</h3>
        <p>Pra você participar, basta querer. Mais que isso: estar disposto a aprender. E às vezes, antes de aprender precisamos desaprender.
          Mas depende mais de você do que da gente. Mas conte com a gente!</p>
        <p>Pré requisitos:</p>
        <ul class="feature-icons">
          <li class="fa-bolt">Ter energia e disposição.</li>
          <li class="fa-book">Saber ler e escrever.</li>
          <li class="fa-users">Pode participar de uns encontros presenciais (dependende do curso).</li>
        </ul>
      </div>
    </section>

    <!-- Three -->
    <section id="three">
      <div class="container">
        <h3>Cursos Disponíveis</h3>

        <div class="features">

          <?

        $sql  = 'SELECT Cursos.*, Membros.Nome ProfessorNome FROM Cursos';
        $sql .= ' JOIN Membros ON(Membros.ID = Cursos.Professor)';
        $sql .= ' ORDER BY Cursos.Nome ASC';
        $cursos = $db->LoadObjects($sql);

        if(count($cursos) > 0){
        ?>

        <p>Veja abaixo quais são os cursos que já estão disponíveis pra você. <br>
          Aproveite e faça sua inscrição agora mesmo.</p>

        <div class="features cursos">
          <?
          foreach($cursos as $curso) {

            $link_curso = SITE_URL . 'curso/' . $curso->Link;
            ?>
            <article>

              <div class="col1">

                <h4 class="onMobile"><?= $curso->Nome; ?></h4>
                <img  class="image" src="<?= UPLOADS_URL . $curso->Capa; ?>" alt=""/>

                <ul class="ficha">
                  <li><strong>Professor:</strong> <?= $curso->ProfessorNome; ?>.</li>
                  <?
                    $total_aulas = curso_getTotalAulas($curso->ID);
                  ?>
                  <li><strong>Aulas:</strong> <?= $total_aulas; ?>.</li>
                  <li><strong>Duração:</strong> Previsão de <?= curso_getDuracaoPrevista(21); ?>.</li>
                </ul>

              </div>


              <div class="inner col2">
                <h4 class="offMobile"><?= $curso->Nome; ?></h4>

                <p><a href="#four" class="quero" cursoTitulo="<?= $curso->Nome; ?>">Quero participar!</a></p>
                <p><?=  nl2p($curso->DescricaoCurta); ?></p>
              </div>
            </article>
            <?
          }
          } else {
          ?>
            <p>Nenhum curso disponível pra você no momento.</p>
            <?
          }
        ?>
          <div style="clear: both"></div>
        </div>



          <div style="clear: both"></div>
        </div>



        </div>
      </div>
    </section>

    <!-- Four -->
    <section id="four">
      <div class="container">
        <h3>Contato</h3>
        <p>Aproveite e mande uma mensagem pra gente e já se inscreva em um curso.</p>
        <form method="post" action="<?= SITE_URL; ?>mails/script.contato.send.php">
          <div class="row uniform collapse-at-2">
            <div class="6u"><input type="text" name="nome" id="nome" placeholder="Seu nome" required /></div>
            <div class="6u"><input type="email" name="email" id="email" placeholder="Seu e-mail" required /></div>
          </div>
          <div class="row uniform">
            <div class="12u"><input type="text" name="assunto" id="assunto" placeholder="Assunto" required /></div>
          </div>
          <div class="row uniform">
            <div class="12u"><textarea name="msg" id="msg" placeholder="Sua mensagem" rows="6" required></textarea></div>
          </div>
          <div class="row uniform">
            <div class="12u">
              <ul class="actions">
                <li><input type="submit" class="special" value="Enviar sua mensagem" /></li>
                <li><input type="reset" value="Limpar" /></li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Five -->
    <!--
      <section id="five">
        <div class="container">
          <h3>Elements</h3>

          <section>
            <h4>Text</h4>
            <p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
            This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
            This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
            <hr />
            <header>
              <h4>Heading with a Subtitle</h4>
              <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
            </header>
            <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
            <header>
              <h5>Heading with a Subtitle</h5>
              <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
            </header>
            <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
            <hr />
            <h2>Heading Level 2</h2>
            <h3>Heading Level 3</h3>
            <h4>Heading Level 4</h4>
            <h5>Heading Level 5</h5>
            <h6>Heading Level 6</h6>
            <hr />
            <h5>Blockquote</h5>
            <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
            <h5>Preformatted</h5>
            <pre><code>i = 0;

while (!deck.isInOrder()) {
print 'Iteration ' + i;
deck.shuffle();
i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
          </section>

          <section>
            <h4>Lists</h4>
            <div class="row collapse-at-2">
              <div class="6u">
                <h5>Unordered</h5>
                <ul>
                  <li>Dolor pulvinar etiam magna etiam.</li>
                  <li>Sagittis adipiscing lorem eleifend.</li>
                  <li>Felis enim feugiat dolore viverra.</li>
                </ul>
                <h5>Alternate</h5>
                <ul class="alt">
                  <li>Dolor pulvinar etiam magna etiam.</li>
                  <li>Sagittis adipiscing lorem eleifend.</li>
                  <li>Felis enim feugiat dolore viverra.</li>
                </ul>
              </div>
              <div class="6u">
                <h5>Ordered</h5>
                <ol>
                  <li>Dolor pulvinar etiam magna etiam.</li>
                  <li>Etiam vel felis at lorem sed viverra.</li>
                  <li>Felis enim feugiat dolore viverra.</li>
                  <li>Dolor pulvinar etiam magna etiam.</li>
                  <li>Etiam vel felis at lorem sed viverra.</li>
                  <li>Felis enim feugiat dolore viverra.</li>
                </ol>
                <h5>Icons</h5>
                <ul class="icons">
                  <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                  <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                  <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                  <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                  <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                  <li><a href="#" class="icon fa-tumblr"><span class="label">Tumblr</span></a></li>
                </ul>
              </div>
            </div>
            <h5>Actions</h5>
            <ul class="actions">
              <li><a href="#" class="button special">Default</a></li>
              <li><a href="#" class="button">Default</a></li>
              <li><a href="#" class="button alt">Default</a></li>
            </ul>
            <ul class="actions small">
              <li><a href="#" class="button special small">Small</a></li>
              <li><a href="#" class="button small">Small</a></li>
              <li><a href="#" class="button alt small">Small</a></li>
            </ul>
            <div class="row collapse-at-2">
              <div class="3u">
                <ul class="actions vertical">
                  <li><a href="#" class="button special">Default</a></li>
                  <li><a href="#" class="button">Default</a></li>
                  <li><a href="#" class="button alt">Default</a></li>
                </ul>
              </div>
              <div class="3u">
                <ul class="actions vertical small">
                  <li><a href="#" class="button special small">Small</a></li>
                  <li><a href="#" class="button small">Small</a></li>
                  <li><a href="#" class="button alt small">Small</a></li>
                </ul>
              </div>
              <div class="3u">
                <ul class="actions vertical">
                  <li><a href="#" class="button special fit">Default</a></li>
                  <li><a href="#" class="button fit">Default</a></li>
                  <li><a href="#" class="button alt fit">Default</a></li>
                </ul>
              </div>
              <div class="3u">
                <ul class="actions vertical small">
                  <li><a href="#" class="button special small fit">Small</a></li>
                  <li><a href="#" class="button small fit">Small</a></li>
                  <li><a href="#" class="button alt small fit">Small</a></li>
                </ul>
              </div>
            </div>
          </section>

          <section>
            <h4>Table</h4>
            <h5>Default</h5>
            <div class="table-wrapper">
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Item One</td>
                    <td>Ante turpis integer aliquet porttitor.</td>
                    <td>29.99</td>
                  </tr>
                  <tr>
                    <td>Item Two</td>
                    <td>Vis ac commodo adipiscing arcu aliquet.</td>
                    <td>19.99</td>
                  </tr>
                  <tr>
                    <td>Item Three</td>
                    <td> Morbi faucibus arcu accumsan lorem.</td>
                    <td>29.99</td>
                  </tr>
                  <tr>
                    <td>Item Four</td>
                    <td>Vitae integer tempus condimentum.</td>
                    <td>19.99</td>
                  </tr>
                  <tr>
                    <td>Item Five</td>
                    <td>Ante turpis integer aliquet porttitor.</td>
                    <td>29.99</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td>100.00</td>
                  </tr>
                </tfoot>
              </table>
            </div>

            <h5>Alternate</h5>
            <div class="table-wrapper">
              <table class="alt">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Item One</td>
                    <td>Ante turpis integer aliquet porttitor.</td>
                    <td>29.99</td>
                  </tr>
                  <tr>
                    <td>Item Two</td>
                    <td>Vis ac commodo adipiscing arcu aliquet.</td>
                    <td>19.99</td>
                  </tr>
                  <tr>
                    <td>Item Three</td>
                    <td> Morbi faucibus arcu accumsan lorem.</td>
                    <td>29.99</td>
                  </tr>
                  <tr>
                    <td>Item Four</td>
                    <td>Vitae integer tempus condimentum.</td>
                    <td>19.99</td>
                  </tr>
                  <tr>
                    <td>Item Five</td>
                    <td>Ante turpis integer aliquet porttitor.</td>
                    <td>29.99</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td>100.00</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </section>

          <section>
            <h4>Buttons</h4>
            <ul class="actions">
              <li><a href="#" class="button special">Special</a></li>
              <li><a href="#" class="button">Default</a></li>
              <li><a href="#" class="button alt">Alternate</a></li>
            </ul>
            <ul class="actions">
              <li><a href="#" class="button special big">Big</a></li>
              <li><a href="#" class="button">Default</a></li>
              <li><a href="#" class="button alt small">Small</a></li>
            </ul>
            <ul class="actions fit">
              <li><a href="#" class="button special fit">Fit</a></li>
              <li><a href="#" class="button fit">Fit</a></li>
              <li><a href="#" class="button alt fit">Fit</a></li>
            </ul>
            <ul class="actions fit small">
              <li><a href="#" class="button special fit small">Fit + Small</a></li>
              <li><a href="#" class="button fit small">Fit + Small</a></li>
              <li><a href="#" class="button alt fit small">Fit + Small</a></li>
            </ul>
            <ul class="actions">
              <li><a href="#" class="button special icon fa-download">Icon</a></li>
              <li><a href="#" class="button icon fa-download">Icon</a></li>
              <li><a href="#" class="button alt icon fa-check">Icon</a></li>
            </ul>
            <ul class="actions">
              <li><span class="button special disabled">Special</span></li>
              <li><span class="button disabled">Default</span></li>
              <li><span class="button alt disabled">Alternate</span></li>
            </ul>
          </section>

          <section>
            <h4>Form</h4>
            <form method="post" action="#">
              <div class="row uniform half ollapse-at-2">
                <div class="6u">
                  <input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
                </div>
                <div class="6u">
                  <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
                </div>
              </div>
              <div class="row uniform half">
                <div class="12u">
                  <div class="select-wrapper">
                    <select name="demo-category" id="demo-category">
                      <option value="">- Category -</option>
                      <option value="1">Manufacturing</option>
                      <option value="1">Shipping</option>
                      <option value="1">Administration</option>
                      <option value="1">Human Resources</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row uniform half collapse-at-2">
                <div class="4u">
                  <input type="radio" id="demo-priority-low" name="demo-priority" checked>
                  <label for="demo-priority-low">Low Priority</label>
                </div>
                <div class="4u">
                  <input type="radio" id="demo-priority-normal" name="demo-priority">
                  <label for="demo-priority-normal">Normal Priority</label>
                </div>
                <div class="4u">
                  <input type="radio" id="demo-priority-high" name="demo-priority">
                  <label for="demo-priority-high">High Priority</label>
                </div>
              </div>
              <div class="row uniform half">
                <div class="6u">
                  <input type="checkbox" id="demo-copy" name="demo-copy">
                  <label for="demo-copy">Email me a copy of this message</label>
                </div>
                <div class="6u">
                  <input type="checkbox" id="demo-human" name="demo-human" checked>
                  <label for="demo-human">I am a human and not a robot</label>
                </div>
              </div>
              <div class="row uniform half">
                <div class="12u">
                  <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                </div>
              </div>
              <div class="row uniform">
                <div class="12u">
                  <ul class="actions">
                    <li><input type="submit" value="Send Message" /></li>
                    <li><input type="reset" value="Reset" class="alt" /></li>
                  </ul>
                </div>
              </div>
            </form>
          </section>

          <section>
            <h4>Image</h4>
            <h5>Fit</h5>
            <span class="image fit"><img src="images/banner.jpg" alt="" /></span>
            <div class="box alt">
              <div class="row no-collapse half uniform">
                <div class="4u"><span class="image fit"><img src="images/pic01.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
              </div>
              <div class="row no-collapse half uniform">
                <div class="4u"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic01.jpg" alt="" /></span></div>
              </div>
              <div class="row no-collapse half uniform">
                <div class="4u"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic01.jpg" alt="" /></span></div>
                <div class="4u"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
              </div>
            </div>
            <h5>Left &amp; Right</h5>
            <p><span class="image left"><img src="images/avatar.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
            <p><span class="image right"><img src="images/avatar.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
          </section>

        </div>
      </section>
    -->

  </div>
<?
html_footer();
?>