console.log('BONJOUR LA LOUPE');



$("#search").keyup(function() // A chaque levée d'une touche du clavier sur l'id search, on fera :

{


    // Nouvelle regex qui comprend la valeur de l'input 'i'

    var myRegExp = new RegExp($(this).val(), 'gi');



    $('.filtre').each(function(){ // Pour chaque élément qui a la classe citée, faire :  et $(this) --> "celui d'avant"

// Si la vérification de la regex renvoie au minimum quelque chose, faire :


        if ($(this).html().match(myRegExp) != null)

        {

            // On affiche le bloc correspondant avec un effet slide

            $(this).show('slide');

        }

        else // Sinon

        {

            // On masque le bloc correspondant avec un effet slideOut

            $(this).hide('slideOut');

        }

    });



});