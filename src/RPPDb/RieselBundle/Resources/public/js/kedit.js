// setup an "add a tag" link
var $addPrimeLink = $('<a href="#" class="add_prime_link">Add a prime</a>');
var $addRangeLink = $('<a href="#" class="add_range_link">Add a range</a>');

jQuery(document).ready(function() {
	onReady('primes', $addPrimeLink);
	onReady('ranges', $addRangeLink);
});

function onReady(table, $addLink) {
	// Get the ul that holds the collection of tags
	var $collectionHolder = $('table.' + table);

	// add the "add a tag" anchor and li to the tags ul
	$('fieldset.' + table).append($addLink);

	// count the current form inputs we have (e.g. 2), use that as the new
	// index when inserting a new item (e.g. 2)
	$collectionHolder.data('index', ($collectionHolder.find('tr').length - 1));

	$addLink.on('click', function(e) {
		// prevent the link from creating a "#" on the URL
		e.preventDefault();

		// add a new tag form (see next code block)
		addForm($collectionHolder, 'tbody.' + table);
	});
}

function addForm($collectionHolder, name) {
	// Get the data-prototype explained earlier
	var prototype = $collectionHolder.data('prototype');

	// get the new index
	var index = $collectionHolder.data('index');

	// Replace '__name__' in the prototype's HTML to
	// instead be a number based on how many items we have
	var newForm = prototype.replace(/__name__/g, index);

	// increase the index with one for the next item
	$collectionHolder.data('index', index + 1);

	// Display the form in the page in an li, before the "Add a tag" link li
	$(name).append(newForm);
}
