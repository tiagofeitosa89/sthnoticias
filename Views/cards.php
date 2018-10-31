    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#" onclick="carregarPagina('Views/cards.php')">Provedores</a>
        </li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">Leiame</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#" onclick="carregarPagina('Views/ViewLeiame.php')">
                    <span class="float-left">Ver detalhes</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">Eu Resolvo</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#" onclick="carregarPagina('Views/Euresolvo.php')">
                    <span class="float-left">Ver detalhes</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>  