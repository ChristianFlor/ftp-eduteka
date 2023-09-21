class TranslucidSquare extends HTMLElement{
    constructor(){
        super();
        this.title = this.getAttribute('title');
        this.highlightTitle = this.getAttribute('highlighttitle');
        this.textbody = this.getAttribute('textbody');
        this.textbtn = this.getAttribute('textbtn');
    }

    connectecCallback(){
        this.render();
    }

    static get observedAttributes(){
        return ['title', 'highlighttitle', 'textbody', 'textbtn']
    }


    attributeChangedCallback(propName, oldValue, newValue){
        this[propName] = newValue;
        this.render();
    }

    render() {
    
        this.innerHTML = `
        <link rel="stylesheet" href="/src/Components/translucid-square/translucid-square.css">
        <div class="translucid-square">
            <div id="square-text">
                <div id="square-title-content">
                    <h1 id="square-title" class="rob-heading1">${this.title}</h1>
                    <h1 id="square-highlight-text" class="rob-heading1">${this.highlighttitle}</h1>
                </div>
                <h3 id="square-body-content">${this.textbody}</h3>
            </div> 
            <button class="btn btn-primary registration">${this.textbtn}</button>
        </div>
        `
    
    }
}

customElements.define('translucid-square', TranslucidSquare);
export default TranslucidSquare;