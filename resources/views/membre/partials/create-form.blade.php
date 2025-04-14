<form action="{{ route('membres.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="NomFr">Nom (Français)</label>
        <input type="text" name="NomFr" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="NomAr">Nom (Arabe)</label>
        <input type="text" name="NomAr" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="CNI">CNI</label>
        <input type="text" name="CNI" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="Telephonne">Téléphone</label>
        <input type="text" name="Telephonne" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" name="Email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="Poste">Le poste</label>
        <select name="Poste" class="form-control" required>
            <option value="">Sélectionner le poste</option>
            <option value="Président">Président</option>
            <option value="Secrétaire">Secrétaire</option>
            <option value="Comptable">Comptable</option>
            <option value="Autre">Autre</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success mt-3" style="width: 50%; border-radius: 10px;">Enregistrer</button>
    </div>
</form>
