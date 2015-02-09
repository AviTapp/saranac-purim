$(document).ready(function(){
	$('input:checkbox').click(function() {
            var qtyUS = Number($('#qtyUS').val());
            var qtyNonUS = Number($('#qtyNonUS').val());
            var famName = $(this).val();
            var famNamePure = famName.replace(/\s+/g, '');
            var famNamePure = famNamePure.replace(/[^a-zA-Z 0-9]+/g, "");
            if ($(this).is(':checked')) {                                       /*INCREASING*/
                if ($(this).attr("name")==="jewsD[]") {
                    /*increase cost*/
                    qtyUS++;
                    $('#qtyUS').val(qtyUS);
                    /*add family to list*/
                    var famNameInsert = '<li id="'+famNamePure+'">'+famName+'</li>';
                    $('#hFamilies').append(famNameInsert);
                } else {
                    /*increase cost*/
                    qtyNonUS++;
                    $('#qtyNonUS').val(qtyNonUS);
                    /*add family to list*/
                    var famNameInsert = '<li id="'+famNamePure+'">'+famName+'</li>';
                    $('#hFamilies').append(famNameInsert);
                }
            } else {                                                            /*DECREASING*/
                if ($(this).attr("name")==="jewsD[]") {
                    /*increase cost*/
                    qtyUS--;
                    $('#qtyUS').val(qtyUS);
                    /*remove family from list*/
                    var famNameDelete = '#'+famNamePure;
                    $(famNameDelete).remove();
                } else {
                    /*increase cost*/
                    qtyNonUS--;
                    $('#qtyNonUS').val(qtyNonUS);
                    /*remove family from list*/
                    var famNameDelete = '#'+famNamePure;
                    $(famNameDelete).remove();
                }
            }
            var qty = qtyUS+qtyNonUS;
            $('#qty').val(qty);
            var cost = (qtyUS*5)+(qtyNonUS*6);
            $('#costTotal').val(cost);
	});
});