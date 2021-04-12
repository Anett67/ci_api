<h1>Liste des utilisateurs</h1>

<form id="email-form" class="mb-5">
    <div class="form-group mb-2">
        <label class="form-label" for="user-email">Rechercher par addresse mail</label>
        <input class="form-control" id="user-email" type="email" name="user_email">
        <input id="site-url" type="hidden" value="<?php echo base_url(); ?>">
    </div>
    <div id="message" class="text-danger mb-2"></div>
    <button class="btn btn-primary" type="submit">Rechercher</button>
</form>

<table class="table">
    <thead>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date d'inscription</th>
    </thead>
    <tbody id="users"></tbody>
</table>

