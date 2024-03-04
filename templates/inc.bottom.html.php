</main>
<footer>
    <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // Initialise AOS (une bibliothèque pour les animations de défilement)
    AOS.init();

    // Lazy loading (chargement paresseux)
    document.addEventListener("DOMContentLoaded", (event) => {
        // Sélectionne tous les éléments avec l'attribut 'data-src'
        let imgs = document.querySelectorAll("[data-src]");

        // Parcourt chaque élément trouvé
        imgs.forEach(function(img) {
            // Remplace la valeur de l'attribut 'src' par la valeur de 'data-src'
            img.src = img.dataset.src;
        });

        // Sélectionne tous les éléments avec l'attribut 'data-href'
        let links = document.querySelectorAll("[data-href]");

        // Parcourt chaque élément trouvé
        links.forEach(function(link) {
            // Remplace la valeur de l'attribut 'href' par la valeur de 'data-href'
            link.href = link.dataset.href;
        });
    });
</script>

<?php
unset($_SESSION['message']);
?>

</body>

</html>