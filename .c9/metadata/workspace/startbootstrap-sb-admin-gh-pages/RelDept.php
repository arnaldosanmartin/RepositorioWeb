{"filter":false,"title":"RelDept.php","tooltip":"/startbootstrap-sb-admin-gh-pages/RelDept.php","ace":{"folds":[],"scrolltop":2413.90625,"scrollleft":0,"selection":{"start":{"row":173,"column":14},"end":{"row":191,"column":23},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":478,"mode":"ace/mode/php"}},"hash":"8fc96866c26b30beee4b0385102d8a53db8cd84a","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":62,"column":0},"end":{"row":159,"column":30},"action":"remove","lines":["   <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark fixed-top\" id=\"mainNav\">","    <a class=\"navbar-brand\" href=\"Home.php\">Home</a>","    <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">","      <span class=\"navbar-toggler-icon\"></span>","    </button>","    <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">","      <ul class=\"navbar-nav navbar-sidenav\" id=\"exampleAccordion\">","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Menu Levels\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseMulti\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-sitemap\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Profesores</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseMulti\">","            <li>","              <a href=\"Perfil.php\"><font color=\"white\">Mi perfil</font></a>","            </li>","            <li>","              <a href=\"tablesMisGroup.php\"><font color=\"white\">Mis grupos</font></a>","            </li>","          </ul>","        </li>","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Example Pages\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseExamplePages\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-file\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Art&iacute;culos</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseExamplePages\">","            <li>","              <a href=\"BusquedaArt.php\"><font color=\"white\">Buscar art&iacute;culos</font></a>","            </li>","            <li>","              <a href=\"tablesArtic.php\"><font color=\"white\">Mis art&iacute;culos</font></a>","            </li>","            <li>","              <a href=\"registerArticulo.php\"><font color=\"white\">Registrar art&iacute;culos</font></a>","            </li>","          </ul>","        </li>","        ","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Link\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseExamplePages2\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-wrench\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Administrac&iacute;on</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseExamplePages2\">","            <?php","              if($_SESSION[\"user_rol\"]==1){","                echo \"<li>","                        <a href='RelGrupo.php'><font color='white'>Relacionar con grupos</font></a>","                      </li>","                      <li>","                        <a href='RelDept.php'><font color='white'>Relacionar con departamentos</font></a>","                      </li>","                      <li>","                        <a href='Profesores.php'><font color='white'>Registrar profesores</font></a>","                      </li>","                      <li>","                        <a href='Revistas.php'><font color='white'>Administrar revistas</font></a>","                      </li>\";","              }","            ?>","            <li>","              <a href=\"Consulta.php\"><font color=\"white\">Consultas</font></a>","            </li>","          </ul>","        </li>","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Charts\">","          <a class=\"nav-link\" href=\"tablesGroup.php\">","            <i class=\"fa fa-fw fa-table\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Grupos de investigaci&oacute;n</font></span>","          </a>","        </li>","      </ul>","      <ul class=\"navbar-nav sidenav-toggler\">","        <li class=\"nav-item\">","          <a class=\"nav-link text-center\" id=\"sidenavToggler\">","            <i class=\"fa fa-fw fa-angle-left\"></i>","          </a>","        </li>","      </ul>","      <ul class=\"navbar-nav ml-auto\">","        <li class=\"nav-item\">","          <a class=\"nav-link\" href=\"Perfil.php\">","            <?php echo $_SESSION[\"user_name\"]; ?></a>","        </li>","        <li class=\"nav-item\">","          <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#exampleModal\">","            <i class=\"fa fa-fw fa-sign-out\"></i><font color=\"white\">Cerrar sesi&oacute;n</font></a>","        </li>","      </ul>","    </div>","  </nav>","  <div class=\"content-wrapper\">","    <div class=\"container-fluid\">","      <!-- Breadcrumbs-->","      <ol class=\"breadcrumb\">","        <li class=\"breadcrumb-item\">","          <a href=\"#\">Home</a>"],"id":588},{"start":{"row":62,"column":0},"end":{"row":159,"column":37},"action":"insert","lines":[" <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark fixed-top\" id=\"mainNav\">","    <a class=\"navbar-brand\" href=\"Home.php\">Home</a>","    <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">","      <span class=\"navbar-toggler-icon\"></span>","    </button>","    <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">","      <ul class=\"navbar-nav navbar-sidenav\" id=\"exampleAccordion\">","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Menu Levels\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseMulti\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-sitemap\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Profesores</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseMulti\">","            <li>","              <a href=\"Perfil.php\"><font color=\"white\">Mi perfil</font></a>","            </li>","            <li>","              <a href=\"tablesMisGroup.php\"><font color=\"white\">Mis grupos</font></a>","            </li>","          </ul>","        </li>","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Example Pages\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseExamplePages\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-file\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Art&iacute;culos</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseExamplePages\">","            <li>","              <a href=\"BusquedaArt.php\"><font color=\"white\">Buscar art&iacute;culos</font></a>","            </li>","            <li>","              <a href=\"tablesArtic.php\"><font color=\"white\">Mis art&iacute;culos</font></a>","            </li>","            <li>","              <a href=\"registerArticulo.php\"><font color=\"white\">Registrar art&iacute;culos</font></a>","            </li>","          </ul>","        </li>","        ","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Link\">","          <a class=\"nav-link nav-link-collapse collapsed\" data-toggle=\"collapse\" href=\"#collapseExamplePages2\" data-parent=\"#exampleAccordion\">","            <i class=\"fa fa-fw fa-wrench\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Administraci&oacute;n</font></span>","          </a>","          <ul class=\"sidenav-second-level collapse\" id=\"collapseExamplePages2\">","            <?php","              if($_SESSION[\"user_rol\"]==1){","                echo \"<li>","                        <a href='RelGrupo.php'><font color='white'>Relacionar con grupos</font></a>","                      </li>","                      <li>","                        <a href='RelDept.php'><font color='white'>Relacionar con departamentos</font></a>","                      </li>","                      <li>","                        <a href='Profesores.php'><font color='white'>Registrar profesores</font></a>","                      </li>","                      <li>","                        <a href='Revistas.php'><font color='white'>Administrar revistas</font></a>","                      </li>\";","              }","            ?>","            <li>","              <a href=\"Consulta.php\"><font color=\"white\">Consultas</font></a>","            </li>","          </ul>","        </li>","        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Charts\">","          <a class=\"nav-link\" href=\"tablesGroup.php\">","            <i class=\"fa fa-fw fa-table\"></i>","            <span class=\"nav-link-text\"><font color=\"white\">Grupos de investigaci&oacute;n</font></span>","          </a>","        </li>","      </ul>","      <ul class=\"navbar-nav sidenav-toggler\">","        <li class=\"nav-item\">","          <a class=\"nav-link text-center\" id=\"sidenavToggler\">","            <i class=\"fa fa-fw fa-angle-left\"></i>","          </a>","        </li>","      </ul>","      <ul class=\"navbar-nav ml-auto\">","        <li class=\"nav-item\">","          <a class=\"nav-link\" href=\"Perfil.php\">","            <?php echo $_SESSION[\"user_name\"]; ?></a>","        </li>","        <li class=\"nav-item\">","          <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#exampleModal\">","            <i class=\"fa fa-fw fa-sign-out\"></i><font color=\"white\">Cerrar sesi&oacute;n</font></a>","        </li>","      </ul>","    </div>","  </nav>","  <div class=\"content-wrapper\">","    <div class=\"container-fluid\">","      <!-- Breadcrumbs-->","      <ol class=\"breadcrumb\">","        <li class=\"breadcrumb-item\">","          <a href=\"Home.php\">Home</a>"]}]]},"timestamp":1528237560723}