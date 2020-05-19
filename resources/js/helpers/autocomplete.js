import autocomplete from 'autocomplete.js'
import algolia from 'algoliasearch/lite'

var index = algolia('DHHTMOCE1Y', '51f0f0af183ec0c05e709dffa494424f')

export const listingsautocomplete = (selector) => {
	var index = index.initIndex('listings')

	return autocomplete(selector, {}, [
			{
				source: autocomplete.source.hits(listings, { hitsPerPage: 5 }),
				templates: {
					suggestion (suggestion) {
						console.log(suggestion)
					}
				},
				displayKey: 'title',
				empty: '<div class="">No listings found</div>'
			}
		])
}
