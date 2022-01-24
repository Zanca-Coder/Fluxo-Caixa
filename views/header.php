<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->title;?></title>

    <!-- Bootstrap -->
   
    <link rel="stylesheet" href="<?=URL;?>public/MDB/css/mdb.min.css" />
    <link rel="stylesheet" href="<?=URL;?>public/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
   <link rel="stylesheet" href="<?=URL;?>public/css/main.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  </head>
  <body>

  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">LOGO</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarColor02"
            aria-controls="navbarColor02"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
          <i class="fas fa-bars fa-lg"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="<?=URL;?>">Página Inicial</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdownManut"
                  role="button"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >Consulta e Cadastro</a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdownManut" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start">
                  <li><a class="dropdown-item" href="<?=URL;?>lancamentos">Lançamento</a></li>
                  <li><a class="dropdown-item" href="<?=URL;?>tipo_lancamentos">Tipo de Lançamento</a></li>
                </ul>
              </li>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
              <!-- Icons -->
              <!-- Icon dropdown -->
            
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-expanded="false"
                  aria-haspopup="true"
                >
                  <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="userDropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="null">
            <a class="dropdown-item" href="#">Sair</a>
          </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      

  
    