$(function() {

    /* fontion pour gérer le masque pour le téléphone, utilise la librairie Vanilla Masker */
    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }
    
    var docMask = ['99.99.99.99.99'];
    var doc = document.querySelector('#contact_form_telephone');
    VMasker(doc).maskPattern(docMask[0]);
    doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);

    /* 
     empêche la saisie de mauvais caractère dans le champs de téléphone en récupérant le code
     ascii de la touche saisie au clavier : 
      - le premier caractère est un '0'
      - le second caractère est un chiffre compris entre '1' et '9'
      - les 8 caratères suivants sont des chiffres entre '0' et '9'
     */
    $('#contact_form_telephone').keydown(function(event) {
        let touche = event.which;
        let numero = $('#contact_form_telephone').val();

        if ((numero.length === 0 && touche !== 96 && touche !== 9) || ((touche < 96 || touche > 105) && touche !== 8 && touche !== 9) || (numero.length == 1 && touche === 96)) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    /* téléphone devient obligatoire si "etre-rappel" est par défaut dans l'url */
    if ($('#contact_form_choix').val() === 'etre-rappele') {
        $('#contact_form_telephone').attr('required', true);
    }

    /* 
     quand la valeur du select est modifié : 
      - si "être rappelé" est choisi, le champ téléphone devient obligatoire 
        et une astérisque apparait à côté du nom
      - si "être rappelé" n'est pas choisi, le champ téléphone devient facultatif,
        l'astérisque à côté du nom disparaît et les checkbox de rapelle sont cachées
     */    
    $('#contact_form_choix').on('change', function() {
        if ($('#contact_form_choix').val() === 'etre-rappele') {
            $('#rappel').show();
            $('#contact_form_telephone').prev().html('Téléphone*');
            $('#contact_form_telephone').attr('required', true);
        } else {
            $('#rappel').hide();
            $('#contact_form_telephone').prev().html('Téléphone');
            $('#contact_form_telephone').attr('required', false);
        }
    });

});