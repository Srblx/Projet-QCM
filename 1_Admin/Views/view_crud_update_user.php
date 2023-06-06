<a href="?controller=crud&action=crud" class="link_back_up_crud">Effectuer une nouvelle recherche</a>

<?php if ($user) : ?>
    <form action="?controller=crud&action=crud_confirm_update_user&id=<?= $user->id ?>" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user->nom) ?>" required>
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user->prenom) ?>" required>
        <br>
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->pseudo) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required>
        <br>
        <!-- Ajoutez ici d'autres champs de formulaire pour les autres informations de l'utilisateur -->
        <input type="submit" name="submit" value="Update">
    </form>
<?php else : ?>
    <p>Utilisateur non trouvé.</p>
<?php endif; ?>

<style>
    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        display: block;
        margin: 0 auto;
        background-color: #4CAF50;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    p {
        color: red;
        margin-top: 10px;
    }
</style>