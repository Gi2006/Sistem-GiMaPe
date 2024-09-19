class Header extends HTMLElement {

    static get observedAttributes() {
        return ['base-url',
        'base-view-create',
        'base-view-read'];
    }

    constructor() {
        super();
        this.baseUrl = '';
        this.baseViewCreate = '';
        this.baseViewRead = '';
    }

    connectedCallback() {
        this.render();
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if (name === 'base-url') {
            this.baseUrl = newValue;
        } else if (name === 'base-view-create') {
            this.baseViewCreate = newValue;
        } else if (name === 'base-view-read') {
            this.baseViewRead = newValue;
        } 
        this.render();
    }

    render() {
        this.innerHTML = `
        <header>
            <nav class="nav-header">
                <ul>
                    <li><a href="${this.baseUrl}index.html">Home</a></li>
                    <li>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Cadastro</button>
                        <div id="myDropdown" class="dropdown-content">
                        <a href="${this.baseViewCreate}formCargo.php">Cargo</a>
                        <a href="${this.baseViewCreate}formDepartamento.php">Departamento</a>
                        <a href="${this.baseViewCreate}formFuncionario.php">Funcionário</a>
                        <a href="${this.baseViewCreate}formLogin.php">Login</a>
                        </div>
                    </div>
                    </li>  
                    <li>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Consulta</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="${this.baseViewRead}consultaCargo.php">Cargo</a>
                            <a href="${this.baseViewRead}consultaDepartamento.php">Departamento</a>
                            <a href="${this.baseViewRead}consultaFuncionario.php">Funcionário</a>
                        </div>
                    </div>
                    </li>
                </ul>
            </nav>
            
        </header>
        <hr>
        `;
    }
}

customElements.define("main-header", Header);
