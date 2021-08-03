<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>

<head>
    <title>Ma première page avec du style</title>
</head>
<body>

    <!-- Contenu principal -->
    <h1>Rapport Maintenance</h1>
            <h4>Crée par :</h4><p>{{$main->name}}</p>
            <h4>Nom :</h4><p>{{$main->name_maintance}}</p>
            <h4>Date Debut :</h4><p>{{$main->dateDebut}}</p>
            <h4>Date Fin :</h4><p>{{$main->dateFin}}</p>
            <h4>Type Maintances :</h4><p>{{$main->TypeMaintence}}</p>
            <h4>Nome Departement :</h4><p>{{$main->name_d}}</p>
            <h4>Nom Machine :</h4><p>{{$main->name_m}}</p>
            <h4>Serie Machine :</h4><p>{{$main->serie}}</p>
            <h4>Material :</h4><p>{{$main->material}}</p>
            <h4>Créé A :</h4><p>{{$main->created_at}}</p>

     <!-- Signer et dater la page, c'est une question de politesse! -->
       <address style="float: right;margin-right: 12px">Signature</address>













</body>

</html>
