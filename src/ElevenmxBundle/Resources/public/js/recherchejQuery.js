console.log('BONJOUR LA LOUPE');



$("#search").keyup(function() // A chaque levée d'une touche du clavier sur l'id search, on fera :

{

    console.log('On a appuyé sur une touche, je m"active.');


    // Nouvelle regex qui comprend la valeur de l'input

    var myRegExp = new RegExp($(this).val(), 'i');

    $('.Filtre').each(function(){ // Pour chaque élément qui a la classe citée, faire :

// Si la vérification de la regex renvoie au minimum quelque chose, faire :
        console.log($(this).parent().parent().parent().parent());
        if (($(this).html().match(myRegExp) || []).length != 0)

        {

            // On affiche le bloc correspondant avec un effet slide

            $(this).parent().parent().parent().parent().show('slide');

        }

        else // Sinon

        {

            // On masque le bloc correspondant avec un effet slideOut

            $(this).parent().parent().parent().parent().hide('slideOut');

        }

    });
});