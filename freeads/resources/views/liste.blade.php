<style>
    body {
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        font-weight: bold;
    }

    th {
        background-color: #FF5733;
        color: white;
    }

    tr:hover {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    a {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        text-decoration: none;
        color: #fff;
        background-color: #FF5733; 
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: #d94625;
    }

    .recherche {
        display: flex;
        gap: 50px;
    }

    input,textarea,select {
        padding: 10px;
        margin-right: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input:focus,textarea:focus,select:focus {
        outline: none;
        border-color: #FF5733;
    }

    button {
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    background-color: #FF5733;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

    button:hover {
        background-color: #d94625;
    }


    @media (max-width: 768px) {
        table {
            border-radius: 0;
            box-shadow: none;
        }

        th, td {
            padding: 10px;
        }

        img {
            max-width: 80px;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="recherche">
        <form action="{{ ('search') }}" method="GET">
            <input type="text" name="mot_cle" placeholder="Nom de l'annonce">
            <button type="submit">Rechercher</button>
        </form>
        <form action="{{ ('search') }}" method="GET">
            <input type="number" name="price" placeholder="Prix">
            <button type="submit">Rechercher</button>
        </form>
        <form action="{{ ('search') }}" method="GET">
            <input type="checkbox" name="created_at"> Trier par date la plus récente
            <button type="submit">Rechercher</button>
        </form>    
    </div>

    <table>
        
        <tr>
            <th>Titre</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>

        @foreach ( $annonces as $annonce )
        <tr>
            <td>{{ $annonce->title }}</td>
            <td><img src="{{ Storage::url($annonce->image1) }}" alt="{{ $annonce->title }} - Image1"></td>
            <td><img src="{{ Storage::url($annonce->image2) }}" alt="{{ $annonce->title }} - Image2"></td>
            <td><img src="{{ Storage::url($annonce->image3) }}" alt="{{ $annonce->title }} - Image3"></td>
            <td>{{ $annonce->description }}</td>
            <td>{{ $annonce->price }}</td>
            <td>
                @if ($annonce->iduser == Auth::id())
                <a href="/modifannonce/{{$annonce->id}}">Modifiez</a>
                <a href="/liste/{{$annonce->id}}">Supprimez</a>
                @endif
            </td>
        </tr>
        
        
        @endforeach
    </table>

</body>
</html>