var $addPrimeLink = $('<a href="#" class="add_prime_link">Add a prime</a>');
var $addRangeLink = $('<a href="#" class="add_range_link">Add a range</a>');

jQuery(document).ready(function() {
	onReady('primes', $addPrimeLink);
	onReady('ranges', $addRangeLink);
});

function onReady(table, $addLink) {
	var $collectionHolder = $('table.' + table);

	$('fieldset.' + table).append($addLink);

	$collectionHolder.find('tbody tr').each(function() {
		addRowDeleteLink($(this));
	});

	$collectionHolder.data('index', ($collectionHolder.find('tr').length - 1));

	$addLink.on('click', function(e) {
		e.preventDefault();
		addForm($collectionHolder, 'tbody.' + table);
	});
}

function addForm($collectionHolder, name) {
	var prototype = $collectionHolder.data('prototype');
	var index = $collectionHolder.data('index');
	var newForm = prototype.replace(/__name__/g, index);
	var $newForm = $(newForm);

	$collectionHolder.data('index', index + 1);
	addRowDeleteLink($newForm);

	$(name).append($newForm);
}

function addRowDeleteLink($formRow) {
	var $removeRowA = $('<a href="#">delete</a>');
	var $removeRowTd = $('<td>');
	$removeRowTd.append($removeRowA);
	$formRow.append($removeRowTd);

	$removeRowA.on('click', function(e) {
		e.preventDefault();
		$formRow.remove();
	});
}
