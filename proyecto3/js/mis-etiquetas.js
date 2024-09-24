class Cabecera extends HTMLElement {
    constructor() {
        super()
        this.innerHTML = `
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Els Quitos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../control/ListarProductos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../control/ListarPedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../control/ListarUsuarios.php">Usuarios</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success my-2 my-sm-0" href= "../control/Logout.php" type="submit">Cerrar Sesión</a>
                </form>
            </div>
        </div>
    </nav>
</header>
`
    }
}
window.customElements.define('mi-cabecera', Cabecera);

class Pie extends HTMLElement {
    constructor() {
        super()
        this.innerHTML = `<footer >
        
        
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Información de contacto</h4>
                <p>665586672</p>
                <p>elsquitos@gmail.com</p>
                <p>Avenida de Gandia,17</p>
            </div>
            <div class="col-md-6">
                <h4>Redes Sociales</h4>
                <ul class="redes-sociales">
                    <a href="https://www.facebook.com/" class="facebook"><i class="fab fa-facebook "></i></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" class="instagram"><i class="fab fa-instagram personalizar-color"></i></a>
                    
                </ul>
            </div>
        </div>
    </div>
    &copy; 2024 - Els Quitos S.L. - 
    </footer>    
        `
    }
}
window.customElements.define('mi-pie', Pie);

class Menu extends HTMLElement {
    constructor() {
        super()
        this.innerHTML = `<menu><ul>
                    <li><a href="../control/ListarUsuarios.php">Usuarios</a></li>
                    <li><a href="../control/ListarProductos.php">Productos</a></li>
                    <li><a href="#">Pedidos</a></li>
                    <li><a href="../control/Logout.php">Cerrar sesi&oacute;n</a></li>
                    </ul>
                    </menu>     
        `
    }
}
window.customElements.define('mi-menu', Menu);
