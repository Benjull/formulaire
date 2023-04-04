const container = document.querySelector('.container')
const input = document.getElementById('search')
const btn = document.querySelector('.submit')
const main = document.querySelector('.main')

let livre = null



function getLivre() {
    let x = input.value
    let api = `https://www.googleapis.com/books/v1/volumes?q=${x}`
    axios.get(api)
        .then(reponse => {
            let Livres = reponse.data.items
            showLivre(parseLivres(Livres))
        })

}

function getFavoris() {
    let api = "./gestionfavoris.php?action=list";
    axios.get(api)
        .then(reponse => {
            let Livres = reponse.data;
            showLivre(Livres)
        })
}

function parseLivres(livres) {
    return livres.map((livre) => {
        return {
            title: livre.volumeInfo.title,
            authors: livre.volumeInfo.authors,
            image: livre.volumeInfo.imageLinks ? livre.volumeInfo.imageLinks.thumbnail : "./9115_livre ouvert_Horia Varlan -flickr by 20.jpg",
            livre_id: livre.id
        };
    });
}

function showLivre(Livres) {
    main.innerHTML = ""; // Clear previous search results

    // Create a grid container element for the books
    const gridContainerElem = document.createElement("div");
    gridContainerElem.classList.add("grid-container");
    main.appendChild(gridContainerElem);

    Livres.forEach((Livre) => {
        const { title, authors, image, livre_id } = Livre;

        // Create a card element for the book
        const cardElem = document.createElement("div");
        cardElem.classList.add("card");
        cardElem.style.width = "18rem";
        cardElem.style.height = "30rem";
        cardElem.style.marginBottom = "5rem";
        cardElem.style.position = "relative";
        cardElem.style.left = "20px";
        cardElem.style.boxShadow = "2px 2px 40px 12px #435fc2";
        cardElem.style.transition = "transform 0.2s ease-in-out";


        // Create book image element
        const imageElem = document.createElement("img");
        imageElem.src = image;
        imageElem.classList.add("card-img-top");
        imageElem.style.width = "100%";
        imageElem.style.height = "250px";
        cardElem.appendChild(imageElem);

        // Create card body element
        const cardBodyElem = document.createElement("div");
        cardBodyElem.classList.add("card-body");
        cardElem.appendChild(cardBodyElem);
        const br = document.createElement("br")


        // Create book title element
        const titleElem = document.createElement("h5");
        titleElem.classList.add("card-title");
        titleElem.textContent = "Nom: " + (title);
        titleElem.style.fontWeight = "bold";
        titleElem.style.fontSize = "21px";
        titleElem.style.textAlign = "center";
        titleElem.style.backgroundColor = "rgb(56, 53, 105)";


        cardBodyElem.appendChild(br)
        cardBodyElem.appendChild(titleElem);


        // Create book authors element
        const authorsElem = document.createElement("p");
        authorsElem.classList.add("card-text");
        authorsElem.textContent = "Author: " + (authors ? authors : "Unknown author");
        authorsElem.style.fontSize = "14px";
        authorsElem.style.textAlign = "center";
        authorsElem.style.marginBottom = "0";
        authorsElem.style.backgroundColor = "rgb(56, 53, 105)";



        cardBodyElem.appendChild(authorsElem);


        const form = document.createElement("form");
        form.action = `./Favoris.php?titre=${title}&authors=${authors}`
        form.method = "post"
        console.log(form)

        const inputImg = document.createElement("input");
        inputImg.type = "hidden";
        inputImg.value = image;
        inputImg.name = "image";

        cardBodyElem.appendChild(form)
        form.appendChild(inputImg)

        cardElem.addEventListener("click", async () => {
            let response = await axios.get("./gestionfavoris.php?action=toggle&id=" + livre_id);
            alert(response.data.message)
        })

        // Add hover effect to card element
        cardElem.addEventListener("mouseenter", () => {
            cardElem.style.transform = "scale(1.05)";
        });
        cardElem.addEventListener("mouseleave", () => {
            cardElem.style.transform = "scale(1)";
        });
        // Add card element to the grid container element
        gridContainerElem.appendChild(cardElem);
    });
}



btn.addEventListener('click', () => {
    main.innerHTML = ""
    getLivre()


}) 