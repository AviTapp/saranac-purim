$(document).ready(function(){
	$('input:checkbox').click(function() {
            var qty = Number($('#qty').val());
            var famName = $(this).val();
            var famNamePure = famName.replace(/\s+/g, '');
            var famNamePure = famNamePure.replace(/[^a-zA-Z 0-9]+/g, "");
            if ($(this).is(':checked')) {
                /*increase cost*/
                qty++;
                $('#qty').val(qty);
                /*add family to list*/
                var famNameInsert = '<li id="'+famNamePure+'">'+famName+'</li>';
                $('#hFamilies').append(famNameInsert);
            } else {
                /*decrease cost*/
                qty--;
                $('#qty').val(qty);
                /*remove family from list*/
                var famNameDelete = '#'+famNamePure;
                $(famNameDelete).remove();
            }
            var costUS = '$ '+Number($('#qty').val())*5.00+'.00';
            $('#costUS').val(costUS);
            var costTotal = costUS;
            $('#costTotal').val(costTotal);
	});
});