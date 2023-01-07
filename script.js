function openPopup() {
    $('#popup').css('visibility', 'visible');
}

function closePopup() {
    $('#popup').css('visibility', 'hidden');
}

function confirmation() {
    var result = confirm("Êtes-vous sûr de vouloir supprimer l\'article ?");
    if (result) {
    }
}


function filterBackoffice() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    message = document.getElementById("erreurback");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                tr[i].classList.remove('hidden');
            } else {
                tr[i].style.display = "none";
                tr[i].classList.add('hidden');
            }
        }
    }

    allArticles = Array.from(document.querySelector('tbody').querySelectorAll("tr"));
    if (allArticles.every((element) => element.classList.contains("hidden"))) {
        message.style.display = "block";
        // table.style.display = "none";
        document.querySelectorAll('thead th').style.display = "none";
    } else {
        message.style.display = "none";
        // table.style.display = "";
        document.querySelectorAll('thead th').style.display = "";
    }
}

function filterArticles() {
    // Declare variables
    var recherche, filter, article, h2, i, txtValue;
    recherche = document.getElementById("recherche");
    filter = recherche.value.toUpperCase();
    article = document.querySelectorAll(".article");
    message = document.getElementById("erreurarchives");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < article.length; i++) {
        h2 = article[i].getElementsByTagName("h2")[0];
        if (h2) {
            txtValue = h2.textContent || h2.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                article[i].style.display = "";
                article[i].classList.remove('hidden');
            } else {
                article[i].style.display = "none";
                article[i].classList.add('hidden');
            }
        }
    }

    allArticles = Array.from(document.querySelectorAll(".article"));
    if (allArticles.every((element) => element.classList.contains("hidden"))) {
        message.style.display = "block";
    } else {
        message.style.display = "none";
    }
}

