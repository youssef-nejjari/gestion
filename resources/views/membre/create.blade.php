<!-- resources/views/membre/create.blade.php -->

@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">Ajouter un membre</h1>

    <div class="container">
        <form action="{{ route('membres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NomFr">Nom (Français)</label>
                <input type="text" name="NomFr" class="form-control" id="NomFr" value="{{ old('NomFr') }}" required>
            </div>

            <div class="form-group">
                <label for="NomAr">Nom (Arabe)</label>
                <input type="text" name="NomAr" class="form-control" id="NomAr" value="{{ old('NomAr') }}" required>
            </div>

            <div class="form-group">
                <label for="CNI">CNI</label>
                <input type="text" name="CNI" class="form-control" id="CNI" value="{{ old('CNI') }}" required>
            </div>

            <div class="form-group">
                <label for="Telephonne">Téléphone</label>
                <input type="text" name="Telephonne" class="form-control" id="Telephonne" value="{{ old('Telephonne') }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" class="form-control" id="Email" value="{{ old('Email') }}" required>
            </div>

            <div class="form-group">
                <label for="Poste">Le poste</label>
                <select name="Poste" class="form-control" required>
                    <option value="Poste">Sélectionner le poste</option>
                        <option value="Président">Président</option>
                        <option value="Secrétaire">Secrétaire</option>
                        <option value="Comptable">Comptable</option>
                        <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                    Enregistrer
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('membres.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
        </div>
        </form>
    </div>
@endsection
