<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$article->titre_en}}</h1>
    <p>{!! $article->contenu_en !!}</p>
    <p> <strong>Author :</strong>{{ $article->etudiant ? $article->etudiant->nom : 'No author' }} </p>
    <!-- {{ dd($article->etudiant) }} -->

    
</body>
</html>