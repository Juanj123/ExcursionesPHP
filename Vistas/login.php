<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../Vistas/CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="../Vistas/JS/bootstrap.min.js" rel="stylesheet" type="text/css" />
    <title>Login</title>
 <link rel="shortcut icon" href="../Vistas/img/Niña.png" />
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url(../Vistas/img/beach-1236581.jpg);
            width:100%;
            background-repeat: no-repeat;
            background-size:cover;
            font-family: sans-serif;
        }
        .login-box {
            width: 420px;
            height: 440px;
            background: rgba(0,0,0,0.5);
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 70px 30px;
            border-color: fuchsia;
            border-style: groove;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: 170px;
        }
        h1 {
            margin: 0px;
            padding: 0 0 20px;
            text-align:center;
            font-size: 22px;
        }
        .login-box p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .campos {
            width: 100%;
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        #entrar {
            width: 100%;
            margin-bottom: 20px;
            border: none;
            outline: none;
            height: 40px;
            background: #1c8adb;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        #entrar2 {
            width: 100%;
            margin-bottom: 20px;
            border: none;
            outline: none;
            height: 40px;
            background: #1c8adb;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        #entrar:hover {
            cursor: pointer;
            background: #39dc79;
            color: #000;
        }
        #entrar2:hover {
            cursor: pointer;
            background: #39dc79;
            color: #000;
        }
        .login-box a {
            text-decoration: none;
            font-size: 14px;
            color: #fff;
        }
    </style>
</head>
<body>
    
        <div class="login-box">
            <img src="img/Niña.png" alt="Logo" class="avatar"/>
            <form id="form1" method="post" action="../funciones/validarLogin.php">
                <h1>Login</h1>
                <p>Nombre Usuario</p>
                <input type="text" class="form-control campos" name="nombreusuario" ID="txtnombreusuario" Font-Names="nombreusuario" placeholder="Ingresa Nombre de usuario"/>
                 <p>Contraseña</p>
                <input  type="password" class="form-control campos" ID="txtcontrasena" name="contrasena" placeholder="Ingresa contraseña" />
                <BUTTON type="submit" name="Entrar" value="Entrar"  ID="entrar" >Entrar</BUTTON>
                <br>
                <BUTTON type="submit" name="Registrar" ID="entrar2">Registrar </BUTTON> 
                <a  href="../funciones/correoOlvidarContra.php">Olvidaste Contraseña?</a>
                
            </form>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
           <div class="row">
               <div class="col-2">
                   <LABEL>Introduce tu correo:</LABEL>
               </div>
               <div class="col-10">
                   <input type="text" name="" placeholder="Introduce Correo">
               </div>
           </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
     <script type="text/javascript" src="JS/alertify.js"></script>
</body>
</html>