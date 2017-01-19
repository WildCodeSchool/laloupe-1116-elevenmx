console.log('BONJOUR LA LOUPE');



$("#search").keyup(function() // " search" est notre cible, a chaque levée d'une touche du clavier sur l'id search, on fera :

{

    // Nouvelle regex qui comprend la valeur de l'input 'gi' et 'gi' est ce que l'on tape dans notre recherche (global i)

    var myRegExp = new RegExp($(this).val(), 'gi');


    $('.filtre').each(function(){ // Pour chaque élément dans classe citée, faire :  et $(this) --> "celui d'avant"
// si le matching n'est pas nul faire :


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