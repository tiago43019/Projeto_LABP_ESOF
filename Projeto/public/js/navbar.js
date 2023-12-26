const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});

document.addEventListener('DOMContentLoaded', function () {
    const userMenu = document.querySelector('.user-menu');

    if (userMenu) {
        userMenu.addEventListener('click', function (event) {
            event.stopPropagation();
            this.classList.toggle('active');
        });

        document.addEventListener('click', function (event) {
            if (!userMenu.contains(event.target)) {
                userMenu.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();

        if (query.length >= 3) {
            // Fazer uma solicitação AJAX ao servidor usando o fetch
            fetch(`/search?query=${query}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    displaySearchResults(data);
                })
                .catch(error => {
                    console.error('Erro na solicitação AJAX', error);
                });
        } else {
            // Limpar os resultados se o comprimento da consulta for menor que 3
            clearSearchResults();
        }
    });

    function displaySearchResults(results) {
        // Exibir os resultados na div de resultados
    searchResults.innerHTML = '';

    if (results.length > 0) {
        results.forEach(result => {
            const resultItem = document.createElement('div');
            resultItem.classList.add('search-result-item');

            // Criar um elemento para a foto
            const photoElement = document.createElement('img');
            photoElement.src = result.link_foto; // Substitua 'foto' pelo campo correspondente na sua base de dados
            photoElement.alt = result.nome; // Substitua 'nome' pelo campo correspondente na sua base de dados
            resultItem.appendChild(photoElement);

            // Criar um elemento para o nome
            const nameElement = document.createElement('div');
            nameElement.textContent = result.nome; // Substitua 'nome' pelo campo correspondente na sua base de dados
            resultItem.appendChild(nameElement);

            // Adicionar um evento de clique para redirecionar para a página da atividade
            resultItem.addEventListener('click', function () {
                window.location.href = `/atividades/${result.id}`; // Substitua 'id' pelo campo correspondente na sua base de dados
            });

            searchResults.appendChild(resultItem);
        });
    } else {
        searchResults.innerHTML = '<p>Nenhum resultado encontrado</p>';
    }

    // Mostrar a "cortina"
    searchResults.style.display = 'block';
    }

    function clearSearchResults() {
        // Limpar os resultados
        searchResults.innerHTML = '';
    }
});