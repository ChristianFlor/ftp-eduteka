class EduHeader extends HTMLElement {
    constructor(){
        super();
    }


    connectedCallback(){
        this.render();
    }

    static get observedAttributes(){
        return ['']
    }
    
    attributeChangedCallback(propName, oldvalue, newValue){
        this[propName] = newValue;
        this.render();
        
    }

    render() {
        this.innerHTML=`
        <link rel="stylesheet" href="/src/Components/edu-header/edu-header.css">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
                    <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img id="header_logo" src="/src/images/edutekaLab_logo.png" class="img-fluid">
                    </a>
                </div>
                <div id="main-text">
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 nun-subtitle">Idea</a></li>
                        <li><a href="#" class="nav-link px-2 nun-subtitle">Rubik</a></li>
                        <li><a href="#" class="nav-link px-2 nun-subtitle">Planeo</a></li>
                        <li><a href="#" class="nav-link px-2 nun-subtitle">Mítica</a></li>
                    </ul>

                    <div id="header_log-sign-in-btn"class="col-md-3 text-end">
                        <button type="button" class="btn btn-primary registration">Regístrate</button>    
                        <button type="button" class="btn btn-outline-primary me-2">Ingresar</button>
                    </div>
                </div>
            </header>
        </div>
        `
    }

}

customElements.define('edu-header', EduHeader);
export default EduHeader;