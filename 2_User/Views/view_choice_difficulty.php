<section id="section_choice_difficulty">
    <div class="main">
        <div class="up">
            <a href="?controller=choice&action=demarrage_quizz&theme=<?= $_GET['theme'] ?>&niveau=debutant">
                <button class="card1">
                    <i class="fa-solid fa-star" style="color: #ff00d0;"></i><i class="fa-regular fa-star"
                        style="color: #ff00d0;"></i><i class="fa-regular fa-star" style="color: #ff00d0;"></i>
                </button>
            </a>
            <a href="?controller=choice&action=demarrage_quizz&theme=<?= $_GET['theme'] ?>&niveau=intermediaire">
                <button class="card2">
                    <i class="fa-solid fa-star" style="color: #ff00d0;"></i><i class="fa-solid fa-star"
                        style="color: #ff00d0;"></i><i class="fa-regular fa-star" style="color: #ff00d0;"></i>
                </button>
            </a>
        </div>
        <div class="down">
            <a href="?controller=choice&action=choice"><button class="card3">
                    <i class="fa-solid fa-arrow-up"></i>
                </button></a>
            <a href="?controller=choice&action=demarrage_quizz&theme=<?= $_GET['theme'] ?>&niveau=expert">
                <button class="card4">
                    <i class="fa-solid fa-star" style="color: #ff00d0;"></i><i class="fa-solid fa-star"
                        style="color: #ff00d0;"></i><i class="fa-solid fa-star" style="color: #ff00d0;"></i>
                </button>
            </a>
        </div>
    </div>
</section>