<main id="main_choice_theme">
    <section id="section_choice_theme">
        <div class="card">
            <div class="card-details">
                <p class="text-title">HTML</p>
                <p class="text-body">La fondation de la structure web</p>
            </div>
            <a href="?controller=choice&action=choice_difficulty&theme=1"><button
                    class="card-button">Choisir</button></a>
        </div>
        <div class="card">
            <div class="card-details">
                <p class="text-title">CSS</p>
                <p class="text-body">L'art de la mise en forme élégante</p>
            </div>
            <a href="?controller=choice&action=choice_difficulty&theme=2"><button
                    class="card-button">Choisir</button></a>
        </div>
        <div class="card">
            <div class="card-details">
                <p class="text-title">JS</p>
                <p class="text-body">La puissance du côté client</p>
            </div>
            <a href="?controller=choice&action=choice_difficulty&theme=3"><button
                    class="card-button">Choisir</button></a>
        </div>
        <div class="card">
            <div class="card-details">
                <p class="text-title">PHP</p>
                <p class="text-body">Le moteur côté serveur dynamique</p>
            </div>
            <a href="?controller=choice&action=choice_difficulty&theme=4"><button
                    class="card-button">Choisir</button></a>
        </div>
    </section>
</main>

<?php
if (isset($_SESSION['theme']) || isset($_SESSION['niveau'])) {
    unset($_SESSION['theme']);
    unset($_SESSION['niveau']);
}
?>