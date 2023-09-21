class CardElement extends HTMLElement{
    constructor(){
        super();
        this.logo=this.getAttribute('logo');
        this.subtitle=this.getAttribute('subtitle');
        this.text=this.getAttribute('text');
        this.image=this.getAttribute('image');
    }

    connectedCallback(){
        this.render();
    }

    static get observedAttributes(){
        ['logo', 'subtitle', 'text','image']
    }

    attributeChangedCallback(propName, oldvalue, newValue){
        this[propName] = newValue;
        this.render();
        
    }

    render(){
        this.innerHTML=`
        <link rel="stylesheet" href='/src/Components/cardElement/cardElement.css'>
            <div id="landing-card-container">
                <div class="landing-card-image">
                    <img class="img-fluid" src="${this.image}">
                </div>
                <div class="landing-card-main-container">
                    <div class="landing-card-text-container">
                        <img class ="img-fluid"src="${this.logo}">
                        <h4 id="card-subtitle" class="nun-subtitle">${this.subtitle}</h4>
                        <p class="rob-body">${this.text}</p>
                    </div>
                    <button class="btn btn-primary">Conocer más</button>
                </div>
            </div>
        `
    }
}

customElements.define('card-element',CardElement);
export default CardElement;